<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Session;
use App\Category;
use Helper;
use App\Item;
use App\Role;
use App\ShopManagement;
use App\Recommend;
use App\Client;
use App\Cart;
use App\Order;
use Carbon\Carbon;
use App\Points;
use Mail;
class IndexController extends Controller
{
    //

 
    function index()
    {
        $restratant = DB::table('shop_management')->where('is_delete',1)->get(['id','name']);
    	return view('frontend.home',['restartant'=>$restratant]);
    }

    function memberjson(){
    $data = Points::where('shop_id',Session::get('rest_id'))->where('status',1)->where('is_delete',0)->get(['member_count as members','points_value as points']);
    return response()->json(['html'=>$data]);    
    }

     function approxcost($memval){
        $datas=Points::where('shop_id',Session::get('rest_id'))->where('status',1)->where('is_delete',0)->get();
        foreach($datas as $data){
            if($memval>=$data['starting_value']&&$memval<=$data['ending_value']){
                return response()->json(['point_value'=>$data['points_value']]); 
            }
        }
    }

function test(){

return Session::get('isrole');
    return Role::role();
}


    function restaurant(Request $request){

               $validator = Validator::make($request->all(), [
                'id' => 'required|not_in:0',
                ]
              );
                if($validator->fails()) 
                {
                    return ['status'=>401];         
                }
                Session::put('rest',$request->id);
                $data = explode('_',decrypt($request->id));
                session::put('data',$data);
                Session::put('rest_id',$data[0]);
                Session::put('type',$data[1]);
                Session::forget('cart');

        Session::forget('members');
                Session::forget('points');
                return ['status'=>200];
    }

    function show(Request $request){


    
    }

      function make(Request $request){


    }


    function listing(){

       

        if(Session::has('rest')){
            $type = Helper::OrderType();
   $Menu =new Category;
        try {
            $allCategories=$Menu->tree(Session::get('rest_id'));
        } catch (Exception $e) {

        }
        $type = Helper::OrderType();
        $restratant = DB::table('shop_management')->get(['id','name']);
        $item = Item::all();
       // return $allCategories;
    //    $category  = Category::where('is_delete',0)->get(['category','id','is_parent']);
   $pack=Points::getpoint(Session::get('rest_id'));
        $store = ShopManagement::find(Session::get('rest_id'));
 return  view('frontend.listing',['type'=>$type,'restratant'=>$restratant,'categories'=>$allCategories,'item'=>$item,'store'=>$store,'pack'=>$pack]);
        }
        else{
                return redirect('/');
        }

    }


    function complete(Request $request){


          $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' =>'required|numeric',
                'email'=>'required|email',
                ]
              );
                if($validator->fails()) 
                {
    return response()->json(['errors'=>$validator->errors()->all()]);    

                    }


        if(Session::has('cart')){

    

          $cart  = new Cart;
          $cart->items = Session::get('cart');
          $cart->shop_management_id = Session::get('rest_id');
            if(Session::get('type') == 'p')
            {
                $cart->type = 'P';
                $cart->total = Session::get('points');
                $cart->points = Session::get('members');
            }
            else
            {
                $cart->type = 'T';
                $cart->total = Cart::CartTotal();
            }
                $cart->save();
    
                $client = new Client;
                $client->name = $request->name;
                $client->contact = $request->phone;
                $client->note = $request->note;
           $client->email = $request->email;
                if($request->delivery_date){
                    $client->delivery_date = $request->delivery_date;
         
                    $client->address = $request->address;
                }
                $client->save();
                    $orderid = Session::get('rest_id').Session::get('type').str_random(4).$client->id;
                $order = new Order;
                $order->order_id = strtoupper($orderid);
                $order->order_on = Carbon::now()->toDateTimeString();
                $order->cart_id = $cart->id;
                $order->user_details_id = $client->id;
                $order->cart_shop_management_id = Session::get('rest_id');
                $order->save();

                $data=array(
                    'name'  =>$request->name,
                    'email' =>$request->email,
                    'phone' =>$request->phone,
                    'address'=>$request->address,
                    'notes' =>$request->note,
                    'items'  =>json_decode(Session::get('cart')),
                );

            

                 Mail::send('mail.orderform', $data, function($message) use ($data){
                $message->from('info@reachweb.ca');
                $message->to('developer_02@latlontechnologies.com');
                $message->Subject('Order Details');

            });

                Session::forget('cart');

        Session::forget('members');
                Session::forget('points');
                return response()->json(['status'=>200,'order_id'=>strtoupper($orderid)]);

        }
        else{
              return ['status'=>500];
        }

     //   return $request->all();
    }


    function orders(Request $request){

//return $request->all();


      Session::put('cart',$request->cart_list);


      
      Session::put('members',$request->member);
      Session::put('points',$request->points);
      return ['status'=>200,'members'=>$request->member,'points'=>$request->points];
    

      return ['status'=>200];
      //  return $request->all();
    }
   
}
