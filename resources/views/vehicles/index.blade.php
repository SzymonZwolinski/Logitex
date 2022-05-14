@extends('vehicles.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('vehicles.create') }}"> Dodaj nowy pojazd</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Marka</th>
            <th>Model</th>
            <th>Masa</th>
            <th>Dostepnosc</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $vehicle->Marka }}</td>
            <td>{{ $vehicle->Model }}</td>
            <td>{{ $vehicle->Masa }}</td>
            <td>{{ $vehicle->Dostepnosc }}</td>
            <td>
                <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('vehicles.show',$vehicle->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('vehicles.edit',$vehicle->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $vehicles->links() !!}
      
@endsection