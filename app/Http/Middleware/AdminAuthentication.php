<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next ,$guard = "admin")
    {
      if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {

                 $notification=array(
            'messege'   =>'Permission Denied!!! You do not have administrative access.',
            'alert-type'=>'error'
        );

                 return redirect('/administrator')->with($notification);
            }
        }
        return $next($request);
    }
}
