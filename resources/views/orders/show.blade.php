@extends('orders.layout')
@section('content')
<div class="card">
  <div class="card-header">orders Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title"> ladunek: {{ $orders->ladunek }}</h5>
        <p class="card-text">waga : {{ $orders->waga }}</p>

  </div>
      
    </hr>
  
  </div>
</div>
<a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>
