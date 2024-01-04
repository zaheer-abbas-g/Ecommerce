<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Is_Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(Auth::check()){

        //     if(Auth::user()->is_admin == 1){
        //         return $next($request);
        //     }
        //     else{
        //         redirect('admin/user-home')->with('status','You are not allowed to access the dashboard.!')
        //     }
        // }else{
        //     redirect('admin/user-home')->with('status','please login first');
        // }

        if(Auth::check())
        {
            if(Auth::user()->is_admin==1)
            {
                return $next($request);
            }
            else
            {
                return redirect('user-home')->with('status','Access Denied! as you are not as admin');
            }
        }
        else
        {
            return redirect('/login')->with('status','please login first');
        }
    }
}
