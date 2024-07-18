<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class AutoCheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $skip = ['dashboard.home','dashboard.clients','dashboard.contacts','dashboard.settings','dashboard.role.index'];
        $routeName  = $request->route()->getName(); // users.create
        $permission = Permission::whereRaw("FIND_IN_SET ('$routeName', routes)")->first();
        if($permission){
            if(!request()->user()->can($permission->name)){
                abort(403);
            }
        }else {
        if(in_array($request->route()->getName(), $skip)){
            return $next($request);
        }
         abort(403);
        }
        return $next($request);
    }
}
