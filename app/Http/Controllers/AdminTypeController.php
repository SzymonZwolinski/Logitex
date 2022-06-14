<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = UsersManagement::all();
        if(auth()->user()->type == 1){
            return view ('usersmanagement.index')->with('users', $users);
        } 
        else{
            return redirect()->intended(RouteServiceProvider::USER_HOME);
        }
        
    }
}
