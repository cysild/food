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
use App\Points;
use App\Session;
use App\Role;
use Yajra\Datatables\Datatables;
use Redirect;
class ClientController extends Controller
{
  function index(){
          $data = User::find(Auth::id());
          $shop=ShopManagement::findshop(Auth::id());
         return view('client.setting', ['data' => $data,'shop'=>$shop]);
  }


  function store(Request $request){


     $data = User::find(Auth::id());

        $shop_data=ShopManagement::findshop(Auth::id());

               $validator = Validator::make($request->all(), [
                'shop_name' => 'required|max:150',
                'shop_address'  =>  'required',
                'contact'   =>  'required|max:10',
                'contact2'  =>  'required:max:10',
                'user_name' =>  'required',
                'email'     =>'required|email',
                ],
                [
                 'shop_name.required' => ' Shop Name Required',
                 'shop_address.required' => 'Shop Address Required',
                 'contact.required' => ' Contact Required',
                 'contact2.required' => ' Contact2 Required',
                 'user_name.required' => ' User Name Required',
                 'email.required' => ' Email Required',
                 'shop_name.max' => 'Shop Name Must not be greater than 150 characters',
                 'contact.max' => ' Enter Valid Contact Number',
                 'contact2.max'=>'Enter valid Contact 2 Number',
                 'email.email'  =>'Must Be a Valid Email',
                ]);
                if($validator->fails()) 
                {
                  return back()->withInput()->withErrors($validator->errors());

                         
                }



                if($request->password||$request->repassword){
                   $validator = Validator::make($request->all(), [
                'password'  =>'required|min:8',
                'repassword'   =>'required|same:password|min:8',
                ],
                [
                 'password.required' => ' Password Required',
                 'repassword.required' => ' Re-Enter Password Required',
                 'password.min' =>'Password Must Be more than 8 characters',
                 'repassword.min'=>'Re-Enter Password Must Be more than 8 characters',
                 'repassword.same'=>'Re-Enter Password Must Be same as Password',
                ]);
                if($validator->fails()) 
                {
                  return back()->withInput()->withErrors($validator->errors());               
                }

                }


                $shop =  ShopManagement::find($request->id); 
                $shop->name=$request->shop_name;
                $shop->address=$request->shop_address;
                $shop->is_enable=$request->status;
                $shop->contact=$request->contact;
                $shop->contact1=$request->contact2;

                $shop->save();

               $user =  User::find($request->users_id);

               if($user->email != $request->email){

                      $validator = Validator::make($request->all(), [
                'email'     =>'required|email|unique:users,email',
                ],
                [
                 'email.required' => ' Email Required',
                 'email.email'  =>'Must Be a Valid Email',
                ]);
                if($validator->fails()) 
                {
                return back()->withInput()->withErrors($validator->errors());               
                }


               }
         
                $user->email = $request->email;

       


                $user->name = $request->user_name;
                if($request->password&&$request->repassword){
                $user->password = Hash::make($request->repassword);
              }
               // $user->remember_token = $request->_token;
               $user->save();


         
      return back()->with('message', 'Updated Successfully');  
}

function pointindex()
    {
      $heading  = ['id','minimum value','maximum value','value','status','action'];
    $pages = Helper::MakeTableView('Pax');
      $table = Helper::TableHeading($heading);
        return view('point.index',['heading'=>$heading,'page'=>$pages,'table'=>$table]);
    }

function table_list(){

     $data = Points::selectall();

 return Datatables::of($data)
                ->rawColumns(['action','category','status'])
                ->addColumn('status',function ($data)
{
                  return Helper::publishstatus($data->status);
}

                )

            ->addColumn('action', function ($data) {
                return '<a data-act="ajax-modal"  data-id="'.$data->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> 
                <a data-act="ajax-modal-del" data-id="'.$data->id.'" class="btn btn-xs btn-danger" ><i class="glyphicon glyphicon-edit" ></i> Delete</a>';
            })
         ->editColumn('id', 'ID: {{$id}}')
        ->make(true);

            return $data;

        
        }

         function pointstore(Request $request){

             $validator = Validator::make($request->all(), [
                'starting_value' => 'numeric|required|nullable',
                'ending_value' => 'numeric|required|nullable',
                'point_value' => 'numeric|required|nullable',
                ],
                [
                 'starting_value.required' => 'Minimum Value Required',
                 'point_value.required'=>'Pax Value Required',
                 'starting_value.nullable' => 'Minimum Value cannot be Null',
                 'point_value.nullable'=>'Pax Value cannot be Null',
                  'ending_value.required' => 'Maximum Value Required',
                 'ending_value.nullable' => 'Maximum Value cannot be Null',
                 'starting_value.numeric' => 'Minimum Value must be a number',
                 'point_value.numeric'=>'Pax Value must be a number',
                  'ending_value.numeric' => 'Maximum Value must be a number',

                
                ]);
                if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                }

                if($request->ending_value < $request->starting_value){

                    $errors[]="Maximum value must be greater than Minimum value";

                    return response()->json(['errors'=>$errors]);     
                }

                if($request->id){
                  $member=Points::find($request->id);
                }
                else{
                  $member=new Points;
                }

                $member->starting_value=$request->starting_value;
                $member->ending_value=$request->ending_value;
                $member->points_value=$request->point_value;
                $member->shop_id = Role::shop();

                 if($request->status){
                $member->status = $request->status;
                }else{
                $member->status = 0;
                }

                $member->save();

                  return response()->json(['success'=>'Data Recorded']);     

}

 function show($id)
    {
                $data = Points::pointseditview($id);
                return response()->json( ['html'=>$data]);
    }


function drop($id){
    $data = Points::find($id);
    $data->is_delete = 1;
    $data->save();
            return  response()->json(['success'=>'deleted']);           

}


function packlist(Request $request){
  
            $search = $request->q;
            $data = DB::table("member_points")
                ->select('*')
                    ->where('status',1)
                    ->where('is_delete',1)
                ->get();
             $res = array();
            foreach ($data as $value) {                     
            
                $res[]= array(
                            'name' => $value->member_count,
                            'id' => $value->id
                );    
           }

           return $res;
        }

  function adminstore(Request $request){
               $user =  User::find($request->users_id);


               $validator = Validator::make($request->all(), [
                'user_name' =>  'required',
                'email'     =>'required|email',
                ],
                [
                 'user_name.required' => ' User Name Required',
                 'email.email'  =>'Must Be a Valid Email',
                ]);
                if($validator->fails()) 
                {
                  return back()->withInput()->withErrors($validator->errors());     
                }

                if($request->password||$request->repassword){

                   $validator = Validator::make($request->all(), [
                'password'  =>'required|min:8',
                'repassword'   =>'required|same:password|min:8',
                ],
                [
                 'password.required' => ' Password Required',
                 'repassword.required' => ' Re-Enter Password Required',
                 'password.min' =>'Password Must Be more than 8 characters',
                 'repassword.min'=>'Re-Enter Password Must Be more than 8 characters',
                 'repassword.same'=>'Re-Enter Password Must Be same as Password',
                ]);
                if($validator->fails()) 
                {
                  return back()->withInput()->withErrors($validator->errors());               
                }


                }


                $user->name = $request->user_name;
                $user->email = $request->email;
                if($request->password){
                $user->password = Hash::make($request->password);
              }
               // $user->remember_token = $request->_token;
               $user->save();


                return back()->with('message', 'Updated Successfully'); 
}



}

?>