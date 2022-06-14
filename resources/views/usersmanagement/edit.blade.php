@extends('usersmanagement.layout')
@section('content')
<div class="card">
  <div class="card-header">Edycja konta</div>
  <div class="card-body">
      
      <form action="{{ url('usersmanagement/' .$usersmanagement->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$usersmanagement->id}}" id="id" />
        <label>name</label></br>
        <input type="text" name="name" id="name" value="{{$usersmanagement->name}}" class="form-control"></br>
        <label>nazwisko</label></br>
        <input type="text" name="nazwisko" id="nazwisko" value="{{$usersmanagement->nazwisko}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="email" name="email" id="email" value="{{$usersmanagement->email}}" class="form-control"></br>
        <label>Typ konta</label></br>
        <input type="number" name="type" id="type" value="{{$usersmanagement->type}}" class="form-control"></br>
        <input type="submit" value="Aktualizuj" class="btn btn-success"></br>
        
    </form>
  
  </div>
</div>
<a href="{{url('/usersmanagement')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do wyboru użytkowników</button></a>

@stop