<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\final_order_location;
use App\Models\final_orders; 
class final_order_locationController extends Controller
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
        
        return view ('final_order_location.create')->with('flash_message', 'Dodano kraj oraz miasto!');
    }
   
    
    public function create()
    {
        return view('final_order_location.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        final_order_location::create($input);
        return redirect('final_order_location')->with('flash_message', 'final__order_location Addedd!');  
    }

    



}
