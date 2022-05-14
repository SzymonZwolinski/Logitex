@extends('trailers.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 Crud</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/trailers/create') }}" class="btn btn-success btn-sm" title="Add New Trailer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>kubatura</th>
                                        <th>waga</th>
                                        <th>liczba_osi</th>
                                        <th>szerokosc</th>
                                        <th>dlugosc</th>
                                        <th>wysokosc</th>
                                        <th>dostepnosc</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($trailers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kubatura }}</td>
                                        <td>{{ $item->waga }}</td>
                                        <td>{{ $item->liczba_osi }}</td>
                                        <td>{{ $item->szerokosc }}</td>
                                        <td>{{ $item->dlugosc }}</td>
                                        <td>{{ $item->wysokosc }}</td>
                                        <td>{{ $item->dostepnosc }}</td>
                                        <td>
                                            <a href="{{ url('/trailers/' . $item->id) }}" title="View Trailer"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/trailers/' . $item->id . '/edit') }}" title="Edit Trailer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/trailers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Trailer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection