<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Hash;
use Validator;
use Auth;
use Session;
use App\Role;
use DB;
class RoleController extends Controller
{
    //


function index(){

    if(Role::role()== 1){
        return Redirect('/admin/restaurant');
    }
    else{
        return Redirect('/admin/items');

    }
}

    function check(Request $request){
    	
    		$validator = Validator::make($request->all(), [
	       		'password' => 'required|min:8',
	       		'email'=>'required|email',
	    		]);

			if($validator->fails()) 
				{
				return back()->withInput()->withErrors($validator->errors());				
				}	
 
       if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        { 

                $user=DB::table('users')
                        ->where('email',$request->email)
                        ->select('id')
                        ->first();

                     if($user->id==1) {


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        {

               
                Session::put('role',Role::role());
                   
                      return redirect('/admin');
        }
          else
        {
            return back()->with('danger','Credentials Not Match Contact admin');
        }

    }

                 else{
                    $shop=DB::table('shop_management')
                            ->where('users_id',$user->id)
                            ->select('is_delete')
                            ->first();

                if($shop->is_delete == 0){

                         return back()->with('danger','You are no longer access to be a member,Contact Admin for more');
                }
                else{

                     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        {

               
                Session::put('role',Role::role());
                   
                      return redirect('/admin');
        }
          else
        {
            return back()->with('danger','Credentials Not Match Contact admin');
        }

                

                }
        }   
        

        }
        
         else
        {
            return back()->with('danger','Credentials Not Match Contact admin');
        }      

               

    }
}
