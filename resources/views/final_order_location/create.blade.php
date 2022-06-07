@extends('cars.layout')
@section('content')
<div class="card">
  <div class="card-header">Dodaj nowy kierunek</div>
  <div class="card-body">
      
      <form action="{{ url('final_order_location/') }}" method="post">
        {!! csrf_field() !!}
        <label>id_zamowienia</label></br>
        <input type="text" name="id_zamowienia" id="id_zamowienia" class="form-control"></br>
        <label>nadawca</label></br>
        <input type="text" name="nadawca" id="nadawca" class="form-control"></br>
        <label>kraj</label></br>
        <input type="text" name="kraj" id="kraj" class="form-control"></br>
        <label>miasto</label></br>
        <input type="text" name="miasto" id="miasto" class="form-control"></br>

        <input type="submit" value="Dodaj" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
<a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Koniec</button></a>
@stop