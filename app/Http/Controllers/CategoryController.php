<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use Validator;
use Auth;
use Helper;
use Yajra\Datatables\Datatables;
use App\Role;
use DB;
use App\Item;
class CategoryController extends Controller
{
    //


    function index()
    {
    	$heading  = ['id','category','description','status','action'];
		$pages = Helper::MakeTableView('Category');
    	$table = Helper::TableHeading($heading);
        return view('category.index',['heading'=>$heading,'page'=>$pages,'table'=>$table]);
    }
    function store(Request $request)
    {
    	       $validator = Validator::make($request->all(), [
                'catgeory' => 'required|max:150',
                ],
                [
                 'catgeory.required' => ' food category Required',
                ]);
                if($validator->fails()) 
                {
                return response()->json(['errors'=>$validator->errors()->all()]);               
                }
                if(!$request->id){
                $data = new Category;
                $data->created_by = Auth::id();
            	}
            	else{
            	$data =  Category::find($request->id);
            	$data->updated_by = Auth::id();
            	}
                if($request->is_parent){
                    $data->is_parent = $request->is_parent;
                }
                else{
                    $data->is_parent = NULL;
                }
            	$data->name = $request->catgeory;
            	$data->description = $request->desc;
            	$data->status = (isset($request->status)  ? 1 : 0);
            	$data->shop_management_id = Role::shop();
            	$data->save();
            	return response()->json(['success'=>'Data Recorded']); 
    }

    function show($id)
    {
                $data = Category::find($id);
                return response()->json( ['html'=>$data]);
    }


    function table_list()
        {
           

    $data = Category::where('is_delete',0)->where('shop_management_id',Role::shop())->get(['name as category','description','status','id']);
     return Datatables::of($data)
    ->rawColumns(['description','action','status'])
    ->editColumn('description' ,function ($data){
    return str_limit($data->description,25,'...');
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

    	}

        function sub(Request $request){
         $data = Category::whereNull('is_parent')->where('status',1)->WHERE('is_delete',0)->where('shop_management_id',Role::shop())->get(['id', 'name as category']);
          return response()->json( ['sub'=>$data]);
        }

        function categoryjson(Request $request){

         $data = Category::where('is_parent',$request->id)->where('shop_management_id',Role::shop())->get(['id', 'name as category']);
          return response()->json( ['sub'=>$data]);
        }

function drop($id){
   $findparent=Category::findparent($id);


  if($findparent >= 1){
    $msg="Cannot Delete this Category. It is parent category.";
    return response()->json(['error'=>$msg]);
  }
  else  if ($findparent == 0){
  
        $finditem=Item::findhasitem($id);

        if($finditem >= 1){
            $msg="Cannot Delete this Category. It is has Food Items.";
                return response()->json(['error'=>$msg]);
        }
        else{
            $data=Category::find($id);
            $data->is_delete = 1;
                $data->save();
                 return  response()->json(['success'=>'deleted ']); 

        }

  }

     
}





}
