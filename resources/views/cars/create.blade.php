@extends('cars.layout')
@section('content')
<div class="card">
  <div class="card-header">Vehicles Page</div>
  <div class="card-body">
      
      <form action="{{ url('cars/') }}" method="post">
        {!! csrf_field() !!}
        <label>marka</label></br>
        <input type="text" name="marka" id="marka" class="form-control"></br>
        <label>model</label></br>
        <input type="text" name="model" id="model" class="form-control"></br>
        <label>dopuszczalna_masa</label></br>
        <input type="number" name="dopuszczalna_masa" id="dopuszczalna_masa" class="form-control"></br>
        <label>P_dostepnosc</label></br>
        <input type="number" name="P_dostepnosc" id="P_dostepnosc" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop