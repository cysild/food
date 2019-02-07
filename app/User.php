<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;
use Session;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


      public static function getuser($id){
         $data=DB::table('users')
               ->where('id',$id)
               ->select('users.id as users_id','users.name as user_name','users.email as email','users.password as password')
               ->first();

         return $data;
      }

public static function auth($req){

Session::put('isrole',$req);
return $req;
}

}
