<?php
namespace App\Helpers;
use Image;
use DB;
use App\Setting;
use Session;
use App\ Role;
use App\Item;
use Auth;
use App\User;
use App\ShopManagement;
use App\Recommend;
class General {


public static function table_head_lower($str) {
    return strtolower(str_replace("_", " ", $str));
}


public static function table_head_first($str) {
    return ucwords(str_replace("_", " ", $str));
}

public static function ImageUpload($photo,$path,$size){

	     		 $imagename = time().rand().'.'.$photo->getClientOriginalExtension(); 
                 $destinationPath = $path;
                 $thumb_img = Image::make($photo->getRealPath());
                 if($size){
                 $thumb_img = $thumb_img->resize($size);
           		  }
                 $thumb_img->save($destinationPath.'/'.$imagename,80);
                 return $imagename;
}



public static function BaseImageUpload($photo,$path,$size){

                 $imagename = time().rand().'.'.$photo->getClientOriginalExtension(); 
                 $destinationPath = $path;
                 $thumb_img = Image::make($photo->getRealPath());
            
                 $thumb_img = $thumb_img->resize(500,500);
                  
                 $thumb_img->save($destinationPath.'/'.$imagename,80);
                 return $imagename;
}


			public static function ImageCheck($path,$image){
  
					$fileurl = public_path($path);
						if($image == NULL){
									return url('/images/no-image.png');

						}
						else if(file_exists($fileurl.$image)){

							return url($path.$image);
						}
						else{
							return url('/images/no-image.png');
						}

			}

		public static	function MultipleImages($img,$path,$id,$column){
    	          foreach ($img as $key=> $value) 
                {       
                    $imagename = time().rand().'.'.$value->getClientOriginalExtension();               
                    $images[] =   $imagename; 
                                     //      return  $key;
                    $destinationPath = $path;
                    $thumb_img = Image::make($value->getRealPath());
                    $thumb_img->save($destinationPath.'/'.$imagename,80);
                }
                if(!$id){
         		    return   json_encode($images);
                }
                if($id){
                $image =  CarImage::where('id',$id)->first();
                $a1 = $image->$column;
			    if(count(json_decode($a1)) > 0){
			           $a2 = json_encode($images);
			                $a3 = array_merge(json_decode($a1),json_decode($a2));
			                $image->images = json_encode($a3);
			    }
			    else{
			     return json_encode($images);
			     
			    }
				}
		}

public static function  publishstatus($data){

if($data == 1 ){

return '<span class="label label-success">Publish</span>';
}

if($data == 0){

return '<span class="label label-default">Draft</span>';

}


}

public static function  orederstatus($data){

if($data == 'c' ){

return '<span class="label label-success">Closed</span>';
}

if($data == 'o'){

return '<span class="label label-default">open</span>';

}

if($data == 'p'){

return '<span class="label label-warning">Proccessing</span>';

}

}



public static function price($number){


     $decimal = (string)($number - floor($number));
        $money = floor($number);
        $length = strlen($money);
        $delimiter = '';
        $money = strrev($money);
 
        for($i=0;$i<$length;$i++){
            if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
                $delimiter .=',';
            }
            $delimiter .=$money[$i];
        }
 
        $result = strrev($delimiter);
        $decimal = preg_replace("/0\./i", ".", $decimal);
        $decimal = substr($decimal, 0, 3);
 
        if( $decimal != '0'){
            $result = $result.$decimal;
        }
 
        return "Rs. ".$result;



}

public static function ImageExist($images) {
    if(file_exists(public_path().$images)) {
            return url($images);
    }
    

}

public static function MakeListing(){

    $data = Make::where('is_delete',0)->get();
    return $data;
}

public static function TypeListing(){

    $data = CarType::where('is_delete',0)->get();
    return $data;
}

public static function MakeTableView($value){

        $tableurl = url('/admin/'.General::table_head_lower($value).'/list');
        $saveurl = url('/admin/'.General::table_head_lower($value).'/save');
        $viewurl = url('/admin/'.General::table_head_lower($value).'/');
        $delurl = url('/admin/'.General::table_head_lower($value).'/drop');


        $pages = ['title'=>$value,'basemenu'=>'Cars','currenmenu'=>'CarType Listing' , 'subtitle'=>'Listing','content'=>$value,'id'=>'','type_id'=>1,'modal_name'=>'Add'.$value,'table_url'=>$tableurl,'save_url'=>$saveurl,'view_url'=>$viewurl,'delete_url'=>$delurl];

return $pages;


}

public static function TableHeading($heading){

   
        foreach($heading as $head){
                $table[] = ['data'=>General::table_head_lower($head),'name'=>General::table_head_lower($head)];
            }

            return json_encode($table);
}





public static function OrderType(){
    if(Session::get('type') == 't'){
        return 'Take Away';
    }
    else
    {
    return 'Party';
    }
}




public static function category_count($id){


if(Session::get('type') == 't'){

$data = Item::where('food_category_id',$id)->where('status',1)->where('food_category_id',$id)->join('food_meta as m','m.food_items_id','food_items.id')->where('food_items.status',1)
->whereNotNull('m.price')->where('m.on_takeaway',1)->where('food_items.is_delete',0)->count();

if($data == 0){
  $data = Item::where('main_category',$id)->where('status',1)->join('food_meta as m','m.food_items_id','food_items.id')->where('food_items.status',1)
->whereNotNull('m.price')->where('m.on_takeaway',1)->where('food_items.is_delete',0)->count();
}

}
else{
  $data = Item::where('food_items.status',1)->where('food_items.food_category_id',$id)->join('food_meta as m','m.food_items_id','food_items.id')
->whereNotNull('m.points')->where('food_items.status',1)->where('m.on_party',1)->where('food_items.is_delete',0)->count();


if($data == 0)
  $data = Item::where('food_items.main_category',$id)->where('food_items.status',1)->join('food_meta as m','m.food_items_id','food_items.id')
->whereNotNull('m.points')->where('food_items.status',1)->where('m.on_party',1)->where('food_items.is_delete',0)->count();

}

//
return $data;
}

public static function get_items($id){



if(Session::get('type') == 't'){

$data = Item::where('status',1)->where('food_category_id',$id)->join('food_meta as m','m.food_items_id','food_items.id')
->whereNotNull('m.price')->where('m.on_takeaway',1)->where('food_items.is_delete',0)->get(['food_items.id as id','food_items.name','m.price','m.points']);




}
else{
$data = Item::where('food_category_id',$id)->join('food_meta as m','m.food_items_id','food_items.id')
->where('food_items.status',1)->whereNotNull('m.points')->where('m.on_party',1)->where('food_items.is_delete',0)->get(['food_items.id as id','food_items.name','m.price','m.points']);
}



return ['count'=>count($data),'items'=>$data];
}


public static function get_recommend($id){

       $shop=DB::table('shop_management')->where('id',$id)->first();

    $data=Recommend::getitem($shop->id);
$result = [];

if(count($data)>0){
  if($data->items != 'null'){
    $dx= json_decode($data->items);



    $result=DB::table('food_items')
            ->join('food_meta','food_meta.food_items_id','food_items.id')
            ->wherein('food_items.id',$dx)
            ->select('food_items.*','food_meta.*','food_meta.id as metaid')
            ->get();
}
}

 



return ['items'=>$result];
}

public static function shopname(){

            $data = User::where('id',Auth::id())->first();
            if(Role::role() == 1){
      $shopname = 'Admin';

            }else{
          $shop = DB::table('shop_management')->where('users_id',Auth::id())->first();
          $shopname = $shop->name;
            }

            return ['user'=>$data->name,'shop'=>$shopname];
}

public static function showstatus(){
          $shop = DB::table('shop_management')->where('users_id',Auth::id())->first();
          $status = $shop->is_enable;
            return ['shopstatus'=>$status];
}



/*public static function getstatus(){

    $data=DB::table('')
}*/


public static function product_image($image){


  if($image){
    return url('/images/item/thumb/'.$image);
  }
  else{
    return url('images/noimage.png');
  }


}

public static function shop_status_takeaway($shopid){
  $data = Item::where('shop_id',$shopid)->where('food_items.status',1)->join('shop_management','food_items.shop_id','shop_management.id')->join('food_meta','food_items_id','food_items.id')
  ->where('food_meta.on_takeaway',1)->whereNotNull('food_meta.price')
  ->where('shop_management.is_enable',1)->count();
  return $data;
}


public static function shop_status_party($shopid){
  $data = Item::where('food_items.status',1)->where('food_items.shop_id',$shopid)->join('shop_management','food_items.shop_id','shop_management.id')->join('food_meta','food_items_id','food_items.id')
  ->where('food_meta.on_party',1)->whereNotNull('food_meta.points')
  ->where('shop_management.is_enable',1)->count();
  return $data;
}


}




