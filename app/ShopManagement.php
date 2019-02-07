<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ShopManagement extends Model
{
    //

   protected $table = 'shop_management';

   
      public static function selectall(){
         
            $data=DB::table('shop_management')
            ->join('users','users.id','shop_management.users_id')
            ->select('shop_management.name as restaurant name','shop_management.address as restaurant address','shop_management.contact as restaurant contact','users.id as users_id','shop_management.id as id','shop_management.is_enable as status')
            ->where('shop_management.is_delete',1)
            ->get();

            return $data;
      }


      public static function getshop($id){
         $data=DB::table('shop_management')
               ->where('id',$id)
               ->where('is_delete',1)
               ->select('shop_management.name as shop_name','shop_management.address as shop_address','shop_management.is_enable as status','shop_management.contact as contact','shop_management.contact1 as contact2','shop_management.id as id')
               ->first();

         return $data;
      }


      public static function findshop($id){
         $data=DB::table('shop_management')
            ->where('users_id',$id)
            ->select('*')
            ->first();
         return $data;
      }


}
