<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cart extends Model
{
    //
   protected $table = 'cart';


   public static function CartTotal(){
    $total = '';
    $product_list_array = json_decode(Session::get('cart'));
        foreach($product_list_array as $key=>$value) {
            $total += $value->product_price *$value->product_quantity;
        }
		return $total;
   }
   

}
