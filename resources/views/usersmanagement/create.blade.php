@extends('usersmanagement.layout')
@section('content')
<div class="card">
  <div class="card-header">Dodawanie nowego użytkownika</div>
  <div class="card-body">
      
      <form action="{{ url('usersmanagement/') }}" method="post">
        {!! csrf_field() !!}
        <label>Imie</label></br>
        <input type="name" name="name" id="name" class="form-control"></br>
        <label>email</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>
		 <label>Hasło</label></br>
        <input type="hidden" value="12345"  name="password" id="password" class="form-control"></br>
		 <label>Uprawnienia</label></br>
        <input type="number" name="type" id="type" min="0" max="1" class="form-control"></br>
        <input type="submit" value="Zapisz" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop