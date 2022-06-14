<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = Dashboard::all();
        if(auth()->user()->type == 1){
            return view ('dashboard');
        } 
        else{
            return redirect()->intended(RouteServiceProvider::USER_HOME);
        }
        
    }
}
