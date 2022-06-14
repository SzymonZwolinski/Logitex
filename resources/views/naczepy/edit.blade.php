@extends('naczepy.layout')
@section('content')
<div class="card">
  <div class="card-header">Edycja Naczepy</div>
  <div class="card-body">
      
      <form action="{{ url('naczepy/' .$trailers->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH") 
        <input type="hidden" name="id" id="id" value="{{$trailers->id}}" id="id" />
        <label>kubatura</label></br>
        <input type="number" name="kubatura" id="kubatura" value="{{$trailers->kubatura}}" class="form-control"></br>
        <label>waga</label></br>
        <input type="number" name="waga" id="waga" value="{{$trailers->waga}}" class="form-control"></br>
        <label>liczba_osi</label></br>
        <input type="number" name="liczba_osi" id="liczba_osi" value="{{$trailers->liczba_osi}}" class="form-control"></br>
        <label>szerokosc</label></br>
        <input type="number" name="szerokosc" id="szerokosc" value="{{$trailers->szerokosc}}" class="form-control"></br>
        <label>dlugosc</label></br>
        <input type="number" name="dlugosc" id="dlugosc" value="{{$trailers->dlugosc}}" class="form-control"></br>
        <label>wysokosc</label></br>
        <input type="number" name="wysokosc" id="wysokosc" value="{{$trailers->wysokosc}}" class="form-control"></br>
        <label>dostepnosc</label></br>
        <input type="number" name="dostepnosc" id="dostepnosc" value="{{$trailers->dostepnosc}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
<a href="{{url('/naczepy')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do wyboru naczep</button></a>

@stop