@extends('cars.layout')
@section('content')
<div class="card">
  <div class="card-header">Dodaj nowy kierunek</div>
  <div class="card-body">
      
      <form action="{{ url('final_order_location/') }}" method="post">
        {!! csrf_field() !!}
        <label>Id zamówienia -> nadawca</label>
        <select name="cars" id="cars">
          @foreach($data as $item)
          <option value="{{$item->nadawca}}">{{$item->ID_ZAMOWIENIA}} -> {{$item->nadawca}}</option>
          @endforeach
        </select>
        <br>
        <br>
        <label>kraj</label></br>
        <input type="text" name="kraj" id="kraj" class="form-control"></br>
        <label>miasto</label></br>
        <input type="text" name="miasto" id="miasto" class="form-control"></br>
        <label>opis</label></br>
        <input type="text" name="opis" id="opis" class="form-control"></br>


        <input type="submit" value="Dodaj" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
<a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Koniec</button></a>
@stop