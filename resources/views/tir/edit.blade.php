@extends('tir.layout')
@section('content')
<div class="card">
  <div class="card-header">Edycja pojazdów</div>
  <div class="card-body">
      
      <form action="{{ url('tir/' .$cars->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$cars->id}}" id="id" />
        <label>marka</label></br>
        <input type="text" name="marka" id="marka" value="{{$cars->marka}}" class="form-control"></br>
        <label>model</label></br>
        <input type="text" name="model" id="model" value="{{$cars->model}}" class="form-control"></br>
        <label>dopuszczalna_masa</label></br>
        <input type="number" name="dopuszczalna_masa" id="dopuszczalna_masa" value="{{$cars->dopuszczalna_masa}}" class="form-control"></br>
        <input type="submit" value="Aktualizuj" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
<a href="{{url('/tir')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do wyboru tirów</button></a>

@stop