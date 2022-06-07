<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trailer;

class naczepaController extends Controller
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
        $trailers = Trailer::all();
        return view ('naczepy.index')->with('trailers', $trailers);
    }
    
    public function create()
    {
        return view('naczepy.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        Trailer::create($input);
        return redirect('naczepy')->with('flash_message', 'Trailer Addedd!');  
    }
    
    public function show($id)
    {
        $trailer = Trailer::find($id);
        return view('naczepy.show')->with('trailers', $trailer);
    }
    
    public function edit($id)
    {
        $trailers = Trailer::find($id);
        return view('naczepy.edit')->with('trailers', $trailers);
    }
  
    public function update(Request $request, $id)
    {
        $trailer = Trailer::find($id);
        $input = $request->all();
        $trailer->update($input);
        return redirect('naczepy')->with('flash_message', 'trailer Updated!');  
    }
  
    public function destroy($id)
    {
        Trailer::destroy($id);
        return redirect('naczepy')->with('flash_message', 'Trailer deleted!');  
    }
}
