@extends('usersmanagement.layout')
@section('content')
<div class="card">
  <div class="card-header">Edycja konta</div>
  <div class="card-body">
      
      <form action="{{ url('usersmanagement/' .$item->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$item->id}}" id="id" />
        <label>Nick</label></br>
        <input type="number" name="name" id="name" value="{{$item->name}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="number" name="email" id="email" value="{{$item->email}}" class="form-control"></br>
        <label>Typ konta</label></br>
        <input type="number" name="type" id="type" value="{{$item->type}}" class="form-control"></br>
        
    </form>
  
  </div>
</div>
<a href="{{url('/usersmanagement')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do wyboru użytkowników</button></a>

@stop