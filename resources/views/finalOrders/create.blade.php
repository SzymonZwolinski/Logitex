@extends('orders.layout')
@section('content')
<div class="card">
  <div class="card-header">orders Page</div>
  <div class="card-body">
      
      <form action="{{ url('orders/') }}" method="post">
        {!! csrf_field() !!}
        <label>kubatura</label></br>
        <input type="number" name="kubatura" id="kubatura" class="form-control"></br>
        <label>waga</label></br>
        <input type="number" name="waga" id="waga" class="form-control"></br>
        <label>liczba_osi</label></br>
        <input type="number" name="liczba_osi" id="liczba_osi" class="form-control"></br>
        <label>szerokosc</label></br>
        <input type="number" name="szerokosc" id="szerokosc" class="form-control"></br>
        <label>dlugosc</label></br>
        <input type="number" name="dlugosc" id="dlugosc" class="form-control"></br>
        <label>wysokosc</label></br>
        <input type="number" name="wysokosc" id="wysokosc" class="form-control"></br>
        <label>dostepnosc</label></br>
        <input type="number" name="dostepnosc" id="dostepnosc" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
<a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>

@stop