<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use App\Category;
use App\Role;
class Item extends Model
{
    //
       protected $table = 'food_items';

       public static function FoodItems(){
       	$data = DB::table('food_items')->where('food_items.is_delete',0)
            ->leftJoin('food_meta as m', 'm.food_items_id', '=', 'food_items.id')
            ->leftJoin('food_category as p', 'p.id', '=', 'food_items.main_category')

            ->leftJoin('food_category as s', 's.id', '=', 'food_items.food_category_id')->
                        where('p.shop_management_id',Role::shop())

            ->get(['food_items.name as items','p.name as parent','s.name as sub','food_items.id','food_items.status','m.price','m.points']);

            return $data;
       }

              public static function FoodItemsGet(){
        $data = DB::table('food_items')->where('food_items.is_delete',0)
            ->leftJoin('food_meta as m', 'm.food_items_id', '=', 'food_items.id')
            ->leftJoin('food_category as p', 'p.id', '=', 'food_items.main_category')
            ->leftJoin('food_category as s', 's.id', '=', 'food_items.food_category_id')->
            where('p.shop_management_id',Session::get('rest_id'))
            ->get(['food_items.name as items','p.name as parent','s.name as sub','food_items.id','food_items.status','m.price']);

            return $data;
       }

        public static function FoodItemView($id){
       	$data = DB::table('food_items')
            ->leftJoin('food_meta as m', 'm.food_items_id', '=', 'food_items.id')
            ->where('food_items.id',$id)->select('food_items.*','m.*','food_items.id')
            ->first();

            return $data;
       }


public function categories()
{
return $this->belongsTo(Category::class);
}


public static function products()
{
    return  $this->hasMany('App\Item','food_category_id','id');
}



public static function mylist() {

return static::with(implode('.', array_fill(0, 100, 'products')))->get();

}

public static function selectall($id){

        $data=DB::table('food_items')
                ->where('status',1)
                ->where('is_delete',0)
                ->where('shop_id',$id)
                ->get();

        return $data;
    }

      public static function addcart($id){
        $data = DB::table('food_items')->where('food_items.is_delete',0)->where('food_items.id',$id)
            ->leftJoin('food_meta', 'food_meta.food_items_id', '=', 'food_items.id')
            ->select('food_items.*','food_meta.*','food_items.id as itemid','food_meta.id as metaid')
            ->first();

        return $data;
      }


      public static function findhasitem($id){
        $data=Item::orwhere('main_category',$id)->where('is_delete',0)
          ->where('food_category_id',$id)
         
          ->count();
          return $data;
      }
}
