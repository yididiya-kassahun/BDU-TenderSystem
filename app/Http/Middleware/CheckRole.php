<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if($request->user() === null){
            return response("Insufficient Permission",401);
        }
        $action = $request->route()->getAction();
        $roles = isset($action['roles']);

        if($request->user()->hasAnyRole($roles)){
            return $next($request);
        }
        if(!$roles){
           return response("Insufficient Permission",401);
        }
       
    }
}
