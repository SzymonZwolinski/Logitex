<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\final_order_location;
use App\Models\Order; 
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
        $data = Order::all();

        return view ('final_order_location.create')->with('data',$data);
    }
   
    
    public function create()
    {
        $data = Order::all();
        return view('final_order_location.create')->with('data',$data);
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        final_order_location::create($input);
        return redirect('final_order_location')->with('flash_message', 'final__order_location Addedd!');  
    }

    public function show()
    {
        
        return view ('final_order_location.show');
    }



}
