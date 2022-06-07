@extends('tir.layout')
@section('content')
<div class="card">
  <div class="card-header">Vehicles Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title"> marka: {{ $cars->marka }}</h5>
        <p class="card-text">model : {{ $cars->model }}</p>
        <p class="card-text">dopuszczalna_masa : {{ $cars->dopuszczalna_masa }}</p>
        <p class="card-text">P_dostepnosc : {{ $cars->P_dostepnosc }}</p>
  </div>
      
    </hr>
  
  </div>
</div>