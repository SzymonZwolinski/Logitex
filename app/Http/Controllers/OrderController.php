<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;


class OrderController extends Controller
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
        $request->authenticate();
        $orders = Order::all();
        if(auth()->user()->type == 1){
            return view ('orders.index')->with('orders', $orders);
        } 
        else{
            return redirect()->intended(RouteServiceProvider::USER_HOME);
        }
        
    }
    
    public function create()
    {
        return view('orders.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        Order::create($input);

        return redirect('orders')->with('flash_message', 'Order Addedd!');  
    }
    
    public function show($id)
    {
        $Order = Order::find($id);
        return view('orders.show')->with('orders', $Order);
    }
    
    public function edit($id)
    {
        $orders = Order::find($id);
        return view('orders.edit')->with('orders', $orders);
    }
  
    public function update(Request $request, $id)
    {
        $Order = Order::find($id);
        $input = $request->all();
        $Order->update($input);
        return redirect('orders')->with('flash_message', 'Order Updated!');  
    }
  
    public function destroy($id)
    {

        Order::destroy($id);
        return redirect('orders')->with('flash_message', 'Order deleted!');  
    }

}