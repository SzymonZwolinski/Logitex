<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\finalOrder;
use Illuminate\Support\Facades\DB;


class FinalOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = FinalOrder::orderByDesc('id')->limit(1)->get();
        return view ('finalOrders.index')->with('data',$data);
    }
    
    public function create()
    {
        return view('finalOrders.create');
    }
  
    public function store(Request $request,$id)
    {
        $input = DB::raw('SELECT trailer,id,?, waga, ROUND ((LENGTH(ladunek)- LENGTH( REPLACE ( ladunek, "}", "")))/2) as iloscPalet,CURRENT_TIMESTAMP FROM orders', [$id]);

        finalOrder::create($input);
        return redirect('finalOrders')->with('flash_message', 'Order Addedd!');  
    }
    
    public function show($id)
    {
        $Order = finalOrder::find($id);
        return view('finalOrders.show')->with('finalOrders', $Order);
    }
    
    public function edit($id)
    {
        $orders = finalOrder::find($id);
        return view('finalOrders.edit')->with('FinalOrders', $orders);
    }
  
    public function update(Request $request, $id)
    {
        $Order = finalOrder::find($id);
        $input = $request->all();
        $Order->update($input);
        return redirect('finalOrders')->with('flash_message', 'Order Updated!');  
    }
  
    public function destroy($id)
    {

        finalOrder::destroy($id);
        return redirect('finalOrders')->with('flash_message', 'Order deleted!');  
    }

}