<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class SellerAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard="seller")
    {
        if (Auth::guard($guard)->guest()) {
        if ($request->ajax() || $request->wantsJson()) 
        {
           return response('Unauthorized.', 401);
        }
         else
         {
          return redirect('/seller-login')->with('error','Permission Denied!!! You do not have administrative access.');
         }
        }

        return $next($request);
    }
}
