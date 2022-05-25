@extends('trailers.layout')
@section('content')
<head>
    <!-- Head Contents -->
    <script src="../../js/aframeload.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista naczep w firmie</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/trailers/create') }}" class="btn btn-success btn-sm" title="Add New Trailer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj naczepe
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
                                            {{$item->ladunek}}
                                        <td>
<<<<<<< HEAD
                                            <input type="button" value="Kreuj zamówienie" onclick=" loadtrailer({{ $item->szerokosc}},{{ $item->dlugosc}},{{ $item->wysokosc }} )">
                                            <a href="{{ url('/trailers/' . $item->id) }}" title="View Trailer"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Podgląd</button></a>
                                            <a href="{{ url('/trailers/' . $item->id . '/edit') }}" title="Edit Trailer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</button></a>
=======
                                            <input type="button" value="Wybierz" onclick=" loadtrailer({{$item->id}},{{ $item->szerokosc}},{{ $item->dlugosc}},{{ $item->wysokosc }} )">
                                            <a href="{{ url('/trailers/' . $item->id) }}" title="View Trailer"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/trailers/' . $item->id . '/edit') }}" title="Edit Trailer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
>>>>>>> 818466394d44556b22c872cc3b5b31dd801ad350
                                            <form method="POST" action="{{ url('/trailers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Trailer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Usuń</button>
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