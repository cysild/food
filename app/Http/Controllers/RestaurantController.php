<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ShopManagement;
use Validator;
use Auth;
use Helper;
use DB;
use Hash;
use App\User;
use App\Role;
use Yajra\Datatables\Datatables;
class RestaurantController extends Controller
{



	function index(){


        if(Role::role() == 1){



    $heading  = ['id','restaurant name','restaurant contact','status','action'];
        $pages = Helper::MakeTableView('Restaurant');

        $table = Helper::TableHeading($heading);
        return view('shop.index',['heading'=>$heading,'page'=>$pages,'table'=>$table]);
    }
    else{
return back();
    }

    }

    function shoplist(){



         $data = ShopManagement::selectall();

    //return $data;
     return Datatables::of($data)
     ->rawColumns(['action','status'])
                 ->addColumn('status',function ($data)
{
                  return Helper::publishstatus($data->status);
})

                
                ->addColumn('action', function ($data) {
                return '<a data-act="ajax-modal"  data-id="'.$data->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit Restaurant</a><a data-act="ajax-user"  data-id="'.$data->users_id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit User</a> 
                <a data-act="ajax-modal-del" data-id="'.$data->id.'" class="btn btn-xs btn-danger" ><i class="glyphicon glyphicon-edit" ></i> Delete</a>';
            })
         ->editColumn('id', 'ID: {{$id}}')
        ->make(true);

    }

      function store(Request $request){
 

                

                if(!($request->id)&&!($request->users_id)){


            $validator = Validator::make($request->all(), [
                'email' => 'unique:users,email,',
                ],
                [
                 'email.unique' => 'Already we have the restaurant detail with this email',
                ]);
                if($validator->fails()) 
                {
                    $result = DB::table('users')
                    ->where('email','=',$request->email)
                    ->select('id')
                    ->first();

                    $findshop=DB::table('shop_management')
                            ->where('users_id',$result->id)
                            ->select('is_delete','id')
                            ->first();

                if($findshop->is_delete == 0){
                     $validator = Validator::make($request->all(), [
                'shop_name' => 'required|max:150',
                'shop_address'  =>  'required',
                'contact'   =>  'required|numeric|regex:/^\+?\d[0-9-]{9,12}/',
                'contact2'  =>  'required|numeric|regex:/^\+?\d[0-9-]{9,12}/',
                'user_name' =>  'required',
                'email'     =>'required|email',
                'password'  =>'required|min:8',
                'repassword'   =>'required|same:password|min:8',
                ],
                [
                 'shop_name.required' => ' Restaurant Name Required',
                 'shop_address.required' => 'Restaurant Address Required',
                 'contact.required' => ' Contact Required',
                 'contact2.required' => ' Contact2 Required',
                 'contact.numeric'  => 'Contact Must be a Number',
                 'contact2.numeric'  => 'Contact2 Must be a Number',
                 'user_name.required' => ' User Name Required',
                 'email.required' => ' Email Required',
                 'password.required' => ' Password Required',
                 'repassword.required' => ' Re-Enter Password Required',
                 'shop_name.max' => 'Restaurant Name Must not be greater than 150 characters',
                 'contact.regex' => ' Enter Valid Contact Number',
                 'contact2.regex'=>'Enter valid Contact 2 Number',
                 'email.email'  =>'Must Be a Valid Email',
                 'password.min' =>'Password Must Be more than 8 characters',
                 'repassword.min'=>'Re-Enter Password Must Be more than 8 characters',
                 'repassword.same'=>'Re-Enter Password Must Be same as Password',
                  
                ]);
                if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                }

                $user=User::find($result->id);

                $user->name = $request->user_name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);

                $user->save();

                $shop=ShopManagement::find($findshop->id);

                $shop->name=$request->shop_name;
                $shop->address=$request->shop_address;
                $shop->is_enable=(isset($request->status)  ? 1 : 0);
                $shop->contact=$request->contact;
                $shop->contact1=$request->contact2;
                $shop->users_id=$result->id;
                $shop->is_delete=1;

                $shop->save(); 

                     return response()->json(['success'=>'Already we had the same email so we just update that restaurant detail ']); 
                 }
                 else{

                    return response()->json(['errors'=>$validator->errors()->all()]);    
                 }
                  } 
                  else{
               $validator = Validator::make($request->all(), [
                'shop_name' => 'required|max:150',
                'shop_address'  =>  'required',
                'contact'   =>  'required|numeric|regex:/^\+?\d[0-9-]{9,12}/',
                'contact2'  =>  'required|numeric|regex:/^\+?\d[0-9-]{9,12}/',
                'user_name' =>  'required',
                'email'     =>'required|email',
                'password'  =>'required|min:8',
                'repassword'   =>'required|same:password|min:8',
                ],
                [
                 'shop_name.required' => ' Restaurant Name Required',
                 'shop_address.required' => 'Restaurant Address Required',
                 'contact.required' => ' Contact Required',
                 'contact2.required' => ' Contact2 Required',
                 'contact.numeric'  => 'Contact Must be a Number',
                 'contact2.numeric'  => 'Contact2 Must be a Number',
                 'user_name.required' => ' User Name Required',
                 'email.required' => ' Email Required',
                 'password.required' => ' Password Required',
                 'repassword.required' => ' Re-Enter Password Required',
                 'shop_name.max' => 'Restaurant Name Must not be greater than 150 characters',
                 'contact.regex' => ' Enter Valid Contact Number',
                 'contact2.regex'=>'Enter valid Contact 2 Number',
                 'email.email'  =>'Must Be a Valid Email',
                 'password.min' =>'Password Must Be more than 8 characters',
                 'repassword.min'=>'Re-Enter Password Must Be more than 8 characters',
                 'repassword.same'=>'Re-Enter Password Must Be same as Password',
                  
                ]);
                if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                }
                $user = new User;
                  $user->name = $request->user_name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
               // $user->remember_token = $request->_token;
               $user->save();

                $shop = new ShopManagement;
                 $shop->name=$request->shop_name;
                $shop->address=$request->shop_address;
                $shop->is_enable=(isset($request->status)  ? 1 : 0);
                $shop->contact=$request->contact;
                $shop->contact1=$request->contact2;
                $shop->users_id=$user->id;
                $shop->save(); 

                DB::table('users_has_roles')->insert(
                 ['users_id' => $user->id, 'roles_id' => 2,'shop_id'=> $shop->id]
                );
            }
        }
            if($request->id){

               $validator = Validator::make($request->all(), [
               'shop_name' => 'required|max:150',
                'shop_address'  =>  'required',
                'contact'   =>  'numeric|required|regex:/^\+?\d[0-9-]{9,12}/',
                'contact2'  =>  'numeric|required|regex:/^\+?\d[0-9-]{9,12}/',
                ],
                [
                   'shop_name.required' => ' Restaurant Name Required',
                 'shop_address.required' => 'Restaurant Address Required',
                 'contact.required' => ' Contact Required',
                 'contact2.required' => ' Contact2 Required',
                 'contact.numeric'  => 'Contact Must be a Number',
                 'contact2.numeric'  => 'Contact2 Must be a Number',
                 'contact.regex' => ' Enter Valid Contact Number',
                 'contact2.regex'=>'Enter valid Contact 2 Number',
                ]);
                if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                }
                $shop =  ShopManagement::find($request->id); 
                $shop->name=$request->shop_name;
                $shop->address=$request->shop_address;
                $shop->is_enable=$request->status;
                $shop->contact=$request->contact;
                $shop->contact1=$request->contact2;

                $shop->save();


            }
        


        if($request->users_id){
                
               $validator = Validator::make($request->all(), [
                'user_name' =>  'required',
                'email'     =>'required|email',
                ],
                [
                 'user_name.required' => ' User Name Required',
                 'email.required' => ' Email Required',
                 'email.email'  =>'Must Be a Valid Email',
                ]);
               if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                }
            if($request->password){

               $validator = Validator::make($request->all(), [
                'password'  =>'required|min:8',
                'repassword'   =>'required|same:password|min:8',
                ],
                [
                 'password.required' => ' Password Required',
                 'repassword.required' => 'Confirm Password Required',
                 'password.min' =>'Password Must Be more than 8 characters',
                 'repassword.min'=>'Confirm Password Must Be more than 8 characters',
                 'repassword.same'=>'Confirm Password Must Be same as Password',
                ]);

            }

                if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                }


                $user =  User::find($request->users_id);

                $user->name = $request->user_name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
               // $user->remember_token = $request->_token;
               $user->save();
               
 
            }
                 return response()->json(['success'=>'Data Recorded']); 

        

    }

        function getshop($id){
            $data=ShopManagement::getshop($id);
            return response()->json( ['html'=>$data]);

        }

        function getuser($id){
            $data=User::getuser($id);
            return response()->json( ['html'=>$data]);

        }
    

     function drop($id){
      DB::table('shop_management')->where('id', $id)->update(['is_delete' => 0]);
       return  response()->json(['success'=>'deleted ']);  
     }

}