@extends('cars.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('cars/' .$cars->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$cars->id}}" id="id" />
        <label>marka</label></br>
        <input type="text" name="marka" id="marka" value="{{$cars->marka}}" class="form-control"></br>
        <label>model</label></br>
        <input type="text" name="model" id="model" value="{{$cars->model}}" class="form-control"></br>
        <label>dopuszczalna_masa</label></br>
        <input type="number" name="dopuszczalna_masa" id="dopuszczalna_masa" value="{{$cars->dopuszczalna_masa}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop