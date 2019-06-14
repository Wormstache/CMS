<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckEditor
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
        $role=Auth::user()->role()->get()->pluck('name')->toArray();
        if(in_array('user',$role)){
            return $next($request);
        }
        return abort(404);
        // return $next($request);
    }
}
