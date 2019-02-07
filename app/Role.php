<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

use Auth;
class Role extends Model
{
    //
       protected $table = 'users_has_roles';

            public static function role(){
        $data = Role::where('users_id',Auth::id())->first();
             //   $this->Session::set('role',$data->roles_id);

        return $data->roles_id;
    }

      public static function shop(){
        $data = Role::where('users_id',Auth::id())->first();
        return $data->shop_id;
    }
}
