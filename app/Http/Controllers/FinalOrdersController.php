<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\finalOrder;
use App\Models\order;
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
  
    public static function store($id,$uuid)
    {
        $suma_wag = DB::raw('select suma_wag from orders where ID_ZAMOWIENIA = :somevariable',array('somevariable'=> $uuid));
        $trailer = DB::raw('select trailer from orders where ID_ZAMOWIENIA = :somevariable',array('somevariable'=> $uuid));
        $ilosc = DB::raw('select COUNT(*)  from orders where ID_ZAMOWIENIA = :somevariable',array('somevariable'=> $uuid));
        DB::raw('insert into final_orders values (default, ?,?,?,?,?,current_timestamp)',['$trailer','$id','$uuid','$suma_wag','$ilosc']);

        //return redirect('finalOrders')->with('flash_message', 'Order Addedd!');  
        $data = FinalOrder::orderByDesc('id')->limit(1)->get();
        return view ('finalOrders.index')->with('data',$data);
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