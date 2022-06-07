<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CarController;



class tirController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cars = Car::all();
        return view ('tir.index')->with('cars', $cars);
    }
    
    public function create()
    {
        return view('tir.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        Car::create($input);
        return redirect('tir')->with('flash_message', 'Vehicle Addedd!');  
    }
    
    public function show($id)
    {
        $car = Car::find($id);
        return view('tir.show')->with('cars', $car);
    }
    
    public function edit($id)
    {
        $cars = Car::find($id);
        return view('tir.edit')->with('cars', $cars);
    }
  
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $input = $request->all();
        $car->update($input);
        return redirect('tir')->with('flash_message', 'vehicle Updated!');  
    }
  
    public function destroy($id)
    {
        Car::destroy($id);
        return redirect('tir')->with('flash_message', 'Vehicle deleted!');  
    }
}