<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 use App\Category;
 use APp\Item;
 use DB;
class Category extends Model
{
    //

   protected $table = 'food_category';



   public function parent() {

return $this->hasOne('App\Category', 'id', 'is_parent');

}




public function children() {

return $this->hasMany('App\Category', 'is_parent', 'id');

}


public static function products()
{
    return  $this->hasMany('App\Item','food_category_id','id');
}




public static function tree($id) {

return static::with(implode('.', array_fill(0, 100, 'children')))->where('shop_management_id',$id)->where('is_delete',0)->where('status',1)->whereNull('is_parent')->get();

}


public static function mylist() {

return static::with(implode('.', array_fill(0, 100, 'products')))->get();

}

public static function findparent($id){
	$data=DB::table('food_category')
		->where('is_parent',$id)
		->where('is_delete',0)
		->count();

	return $data;
}
}
