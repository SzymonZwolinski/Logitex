<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

use App\Http\Controllers\CarController;



class CarController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cars = Car::all();
        return view ('cars.index')->with('cars', $cars);
    }
    
    public function create()
    {
        return view('cars.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        Car::create($input);
        return redirect('cars')->with('flash_message', 'Vehicle Addedd!');  
    }
    
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show')->with('cars', $car);
    }
    
    public function edit($id)
    {
        $cars = Car::find($id);
        return view('cars.edit')->with('cars', $cars);
    }
  
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $input = $request->all();
        $car->update($input);
        return redirect('cars')->with('flash_message', 'vehicle Updated!');  
    }
  
    public function destroy($id)
    {
        Car::destroy($id);
        return redirect('cars')->with('flash_message', 'Vehicle deleted!');  
    }
}