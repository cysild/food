<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Meta;
use Validator;
use Auth;
use Helper;
use Yajra\Datatables\Datatables;
use Image;
use DB;
use App\Category;
use App\Role;
use App\ShopManagement;
use App\Recommend;
class ItemController extends Controller
{
    //


    function index()
    {
    	$heading  = ['id','items','category','price','points','status','action'];
		$pages = Helper::MakeTableView('Items');
    	$table = Helper::TableHeading($heading);
        return view('item.index',['heading'=>$heading,'page'=>$pages,'table'=>$table]);
    }

    function store(Request $request){
    	     $validator = Validator::make($request->all(), [
                'name' => 'required|max:150',
                'main_category' => 'not_in:0',
  
                'points'=>'nullable|numeric',
                'price'=>'nullable|numeric'
                ],
                [
                 'category.required' => ' Name Required',
                 'main_category.not_in'=>'Category type Required',
                ]);
                if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                }

                if($request->on_takeaway){

               $validator = Validator::make($request->all(), [
                
                'price'=>'required',
                ],
                [
                 'price.required' => 'price Required',

                ]);
                if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                  }
                }

                 if($request->on_party){

               $validator = Validator::make($request->all(), [
                
                'points'=>'required',
                ],
                [
                 'points.required' => ' Points Required',

                ]);
                if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                  }
                }

                if ($request->hasFile('image')) 
                {
                   $validator = Validator::make($request->all(), [
                  'image' => 'image|mimes:jpg,jpeg,png|max:2000'],[
                  'image.required' => 'Please upload an image',
                  'image.mimes' => 'Only jpeg,png and bmp images are allowed',
                  'image.max' => 'Sorry! Maximum allowed size for an image is 2MB',
                  ]);
                    if($validator->fails()) 
                    {
                      return response()->json(['errors'=>$validator->errors()->all()]);           
                    }

            }

			if(!$request->id){
	   			 $item = new Item;
                $item->shop_id = Role::shop();
            }else{
            	$item = Item::find($request->id);
            }
            
                $item->name = $request->name;
                $item->main_category = $request->main_category;
                // $item->food_category_id = $request->food_category_id;
                if(!$request->food_category_id){
                $item->food_category_id = $request->main_category;
                }
                else{
                $item->food_category_id = $request->food_category_id;
                }
                if($request->status){
                $item->status = $request->status;
                }else{
                $item->status = 0;
                }

                 if($request->veggie){
                $item->type = 'n';
                }else{
                $item->type = 'v';
                }

 
            if ($request->hasFile('image')) 
                {
                $photo = $request->file('image');
                $path = public_path('images/item/');
                $size = "" ;
                $image  = Helper::ImageUpload($photo,$path,$size);
         	Image::make($photo)->resize(188, 170)->save( public_path('images/item/thumb/' .$image) );
                $item->image = $image;
            }
            $item->save();
			if(!$request->id)
			{
	   			 $meta = new Meta;
	   			 $meta->food_items_id = $item->id;
                 $meta->created_by = Auth::id();
            }
            else
            {
            $meta = Meta::where('food_items_id',$request->id)->first();
            }
            $meta->price = $request->price;
            $meta->points = $request->points;
            $meta->on_party = (isset($request->on_party)  ? 1 : 0);
            $meta->on_takeaway = (isset($request->on_takeaway)  ? 1 : 0);
            $meta->save();


        return response()->json(['success'=>'Data Recorded']);              





    }


        function table_list(){


     $data = Item::Fooditems();


 return Datatables::of($data)
                ->rawColumns(['action','category','status'])
                ->addColumn('category',  function ($data) {
                   return $data->sub."-".$data->parent;
                 })
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

            function show($id)
    {
                $data = Item::FoodItemView($id);
                return response()->json( ['html'=>$data]);
    }



function drop($id){
    
    $user_id=Auth::id();
    $shop=DB::table('shop_management')
      ->where('users_id',$user_id)
      ->select('id')
      ->first();
    $dx=DB::table('recommend')
    ->where('shop_id',$shop->id)
    ->select('items')
    ->first();
    
    $rec=json_decode($dx->items);
   if(in_array($id,$rec)){
    $x=1;
   }
   else{
    $x=0;
   }

   if($x==0){
    $data = Item::find($id);
     $data->is_delete = 1;
    $data->save();
            return  response()->json(['success'=>'deleted ']); 
   }
   else{
     $msg="Cannot Delete this Item.It is was in Recommended List.";
                return response()->json(['error'=>$msg]);
   }

}

function recommend(){

    
    return view('recommend.index');

}
function itemlist(){
    
   $shop=DB::table('shop_management')->where('users_id',Auth::id())->first();
     $data=Item::selectall($shop->id);



        foreach($data as $value){
                 $res[] =array(
                            'name' =>  $value->name,
                            'id' => $value->id
                );
        }

        return response()->json($res);

}

function recommendstore(Request $request){


    $product=json_encode($request->prod_id);
    $shop=DB::table('shop_management')->where('users_id',Auth::id())->first();
    $recommend=DB::table('recommend')->where('shop_id',$shop->id)->first();


     if(empty($recommend)){

       $recommend=new Recommend;
     }
     else{
        $recommend=Recommend::find($recommend->id);
     }
     

    $recommend->shop_id=$shop->id;
    $recommend->items=$product;

    $recommend->save();
 
    return view('recommend.index');

}
function recommendlist(){
     $shop=DB::table('shop_management')->where('users_id',Auth::id())->first();

    $data=Recommend::getitem($shop->id);


  if($data->items != 'null'){
    $dx= json_decode($data->items);



    $result=DB::table('food_items')->wherein('id',$dx)->get();

       return response()->json($result);
      }
      else{
        return response()->json(['error'=> 'No Product']);
      }

}
function addcart($id){
    $data=Item::addcart($id);


    return response()->json( ['html'=>$data]);
}
}
