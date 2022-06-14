<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersManagement;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;


class UsersManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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
    
    public function create()
    {
        return view('usersmanagement.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        UsersManagement::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'type' =>$input['type'],
            'password' => Hash::make($input['password']),
        ]);
        return redirect('usermanagement')->with('flash_message', 'User dodany');  
    }
    
    public function show($id)
    {
        $users = UsersManagement::find($id);
        return view('usersmanagement.show')->with('usersmanagement', $users);
    }
    
    public function edit($id)
    {
        $users = UsersManagement::find($id);
        return view('usersmanagement.edit')->with('usersmanagement', $users);
    }
  
    public function update(Request $request, $id)
    {
        $users = UsersManagement::find($id);
        $input = $request->all();
        $users->update($input);
        return redirect('usersmanagement')->with('flash_message', 'trailer Updated!');  
    }
  
    public function destroy($id)
    {
        UsersManagement::destroy($id);
        return redirect('usersmanagement')->with('flash_message', 'Trailer deleted!');  
    }
}
