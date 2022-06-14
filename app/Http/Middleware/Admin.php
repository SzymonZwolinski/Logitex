<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    /*
    public function handle($request)
    {
        if (Auth::user()->type == 0) {
            return redirect('user');
        }else{
            return redirect('dashboard');
        }


    }
    */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request)
    {
        if (Auth::user()->type == 0 ) {
            return response()->view('user');
        }elseif((Auth::user()->type == NULL )) {
            return route('login');
        }else{
            return response()->view('dashboard');
            
        }
            
    }
    
  
}



