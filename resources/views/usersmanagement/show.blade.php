@extends('trailers.layout')
@section('content')
<div class="card">
  <div class="card-header">Podgląd informacji o naczepie</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title"> kubatura: {{ $trailers->kubatura }}</h5>
        <p class="card-text">waga : {{ $trailers->waga }}</p>
        <p class="card-text">liczba_osi : {{ $trailers->liczba_osi }}</p>
        <p class="card-text">szerokosc : {{ $trailers->szerokosc }}</p>
        <p class="card-text">dlugosc : {{ $trailers->dlugosc }}</p>
        <p class="card-text">wysokosc : {{ $trailers->wysokosc }}</p>
        <p class="card-text">Dostepnosc : {{ $trailers->dostepnosc }}</p>
  </div>
      
    </hr>
  
  </div>
</div>
<a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>
