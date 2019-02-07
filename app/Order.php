<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
class Order extends Model
{
    //
         protected $table = 'orders';


        public static function ShopOrders($type){

        	$data = Order::where('orders.cart_shop_management_id',Role::shop())->where('type',$type)
					->join('cart as c','c.id','orders.cart_id')
					->join('client_details as d','d.id','orders.user_details_id')
					->get(['orders.order_id as orderid','orders.order_on as date','orders.status','d.name','c.total as total','d.contact','orders.id as id','d.delivery_date as delivery']);

					return $data;

        }


        public static function ShopOrdersGet($id){

        	$data = Order::where('orders.cart_shop_management_id',Role::shop())->where('orders.id',$id)
					->join('cart as c','c.id','orders.cart_id')
					->join('client_details as d','d.id','orders.user_details_id')
					->first(['orders.order_id as orderid','orders.order_on as date','orders.status','d.name','c.total as total','d.contact','d.email','orders.id as id','c.items','c.points as member','d.address','d.delivery_date','c.type']);

					return $data;

        }
}
