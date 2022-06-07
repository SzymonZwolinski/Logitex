@extends('tir.layout')
@section('content')
<head>
    <!-- Head Contents -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 Crud</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/tir/create') }}" class="btn btn-success btn-sm" title="Add New Trailer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj tir
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Marka</th>
                                        <th>Model</th>
                                        <th>Dopuszczalna masa</th>
                                        <th>Dostepnosc</th>

                                </tr>
                                </thead>
                                <tbody>
                               
                                    

                                    <tr>     
                                @foreach($cars as $item)

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->marka }}</td>
                                        <td>{{ $item->model }}</td>
                                        <td>{{ $item->dopuszczalna_masa }}</td>
                                        <td>{{ $item->P_dostepnosc }}</td>
      
                                        <td>

                                            <a href="{{ url('/tir/' . $item->id) }}" title="View order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/tir/' . $item->id . '/edit') }}" title="Edit Trailer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/tir' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
</body>
@endsection