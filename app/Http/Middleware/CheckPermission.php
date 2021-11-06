<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$permission)
    {
        $label = Permission::query()->where('title',$permission);
        if($label->exists()){
            $label = $label ->first()->lable;
            if(!auth()->user()->role->haspermission($permission)){
                abort(403,'شما اجازه ی دسترسی به  بخش '.$label.' را ندارید');
            }
        }else{
            //dd($permission);
            abort(404);
        }
        return $next($request);
    }
}
