@extends('usersmanagement.layout')
@section('content')
<div class="card">
  <div class="card-header">Podgląd informacji o naczepie</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title"> Nick: {{ $item->name }}</h5>
        <p class="card-text">Email : {{ $item->email }}</p>
        <p class="card-text">Typ konta : {{ $item->type }}</p>
       
  </div>
      
    </hr>
  
  </div>
</div>
<a href="{{url('/usersmanagement')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do wyboru użytkowników</button></a>
