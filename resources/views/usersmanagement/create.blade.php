@extends('usersmanagement.layout')
@section('content')
<div class="card">
  <div class="card-header">Dodawanie nowego użytkownika</div>
  <div class="card-body">
  <script type="password/javascript">
let x = Math.floor((Math.random() * 100) * Math.random()*100 + 5000);
document.getElementById("password").setAttribute('value',x);
</script>
      
      <form action="{{ url('usersmanagement/') }}" method="post">
        {!! csrf_field() !!}
        <label>Imie</label></br>
        <input type="name" name="name" id="name" class="form-control"></br>
        <label>email</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>
		 <label>Hasło</label></br>
        <input type="hidden"  name="password" id="password" class="form-control"></br>
          <script>
              let x = Math.floor((Math.random() * 100) * Math.random()*100 + 99999);
              document.getElementById("password").setAttribute('value',x);
          </script>
		 <label>Uprawnienia</label></br>
        <input type="number" name="type" id="type" min="0" max="1" class="form-control"></br>
        <input type="submit" value="Zapisz" class="btn btn-success"></br>
    </form>
    
  
  </div>
</div>
<a href="{{url('/dashboard')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>

@stop