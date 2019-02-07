<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;
class ShopAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Role::role() == 2){
        return $next($request);
        }
        return back();
    }
}
