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
                        <h2>Kreator zamówień</h2>
						<h3>Krok 1: Wybierz naczepę</h3>
                    </div>
                    
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
                                    <div style="display: none">
                                {{$data = DB::table('trailers')
                                ->select('*')
                                ->where('dostepnosc','=','1')
                                ->get();}}
                                </div>
                                @foreach($data as $item)
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

                                            <input type="button" value="Wybierz" onclick=" loadtrailer({{$item->id}},{{ $item->szerokosc}},{{ $item->dlugosc}},{{ $item->wysokosc }},{{ $item->waga }} )">

                                            <a href="{{ url('/trailers/' . $item->id) }}" title="View Trailer"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            
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
<a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>

@endsection