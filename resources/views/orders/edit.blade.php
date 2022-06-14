@extends('orders.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('orders/' .$orders->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$orders->id}}" id="id" />
        <label>ladunek</label></br>
        <input type="number" name="ladunek" id="ladunek" value="{{$orders->ladunek}}" class="form-control"></br>
        <label>waga</label></br>
        <input type="number" name="waga" id="waga" value="{{$orders->waga}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
<a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>

@stop