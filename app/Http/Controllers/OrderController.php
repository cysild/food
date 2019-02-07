<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Helper;
use Yajra\Datatables\Datatables;
use App\Role;
class OrderController extends Controller
{
    //

	  function index_order()
    {
    	$heading  = ['orderid','name','contact','date','total','status','action'];
		$pages = Helper::MakeTableView('Orders');
    	$table = Helper::TableHeading($heading);
        return view('order.index',['heading'=>$heading,'page'=>$pages,'table'=>$table]);
    }


            function table_list_order(){


     $data = Order::ShopOrders('T');


 return Datatables::of($data)
                ->rawColumns(['action','status'])

                ->addColumn('status',function ($data)
{
                  return Helper::orederstatus($data->status);
}

                )
            ->addColumn('action', function ($data) {
                return '<a data-act="ajax-modal"  data-id="'.$data->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> View</a> 
          ';
            })
        ->make(true);

            return $data;

        
        }


        	  function index_party()
    {
    	$heading  = ['orderid','name','contact','Delivery','total','status','action'];
		$pages = Helper::MakeTableView('party');
    	$table = Helper::TableHeading($heading);
        return view('order.index',['heading'=>$heading,'page'=>$pages,'table'=>$table]);
    }


            function table_list_party(){


     $data = Order::ShopOrders('P');


 return Datatables::of($data)
                ->rawColumns(['action','status'])

                ->addColumn('status',function ($data)
{
                  return Helper::orederstatus($data->status);
}
                )
            ->addColumn('action', function ($data) {
                return '<a data-act="ajax-modal"  data-id="'.$data->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> View</a> 
                ';
            })
        ->make(true);
            return $data;
        }


function order_get($id){
	$data = Order::ShopOrdersGet($id);

$items = 	json_decode($data->items);

     return response()->json(['items'=>$items,'order'=>$data]);
}


function order_update(Request $request){

    $data = Order::where('cart_shop_management_id',Role::shop())->where('id',$request->id)->first();

    $data->status = $request->procees;

    $data->save();

    return response()->json(['success'=>'Order Updated']);     

}
}
