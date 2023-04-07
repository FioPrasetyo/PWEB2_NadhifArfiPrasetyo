<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facedes\Auth;
use Closure;
use Illuminate\Http\Request;

class CekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$levels)
    {
        if(in_array($request->Login()->CekUserLogin, $levels)){
            return$next($request);
        }
        if(Auth::user()->level=='1'){
            return redirect('admin/dashboard');
        }elseif(Auth::user()->level=='2'){
            return redirect('manager/dashboard');
        }
    }
}
