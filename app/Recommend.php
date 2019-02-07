<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use App\Category;
use App\Role;
class Recommend extends Model
{
    //
       protected $table = 'recommend';


       public static function getitem($id){
  $data=DB::table('recommend')
    ->join('food_items','food_items.shop_id','=','recommend.shop_id')
    ->where('recommend.shop_id',$id)
    ->select('recommend.id as recommendid','recommend.items')
    ->first();

  return $data;
}
 }
 ?>