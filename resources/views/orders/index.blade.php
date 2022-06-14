@extends('orders.layout')
@section('content')
<head>
    <!-- Head Contents -->
    <script src="../../js/loadorder.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Zamówienia</h2>
                    </div>
                   
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>waga</th>
                                        <th>Wolne miejsce (m^2)</th>
                                        <th>naczepa</th>
                                        <th>ID_ZAMOWIENIA</th>
                                        <th>szerokosc</th>
                                        <th>dlugosc</th>
                                        <th>wysokosc</th>

                                    </tr>
                                </thead>
                                <tbody>
                               
                                    
                                        <div style="display: none">
                                 
                                        {{$data = DB::table('orders as o')
                                ->selectRaw('o.id, o.trailer, o.ID_ZAMOWIENIA, o.suma_wag,o.kubatura, t.szerokosc, t.dlugosc, t.wysokosc, GROUP_CONCAT(o.ladunek) AS ladunek, t.waga')
                                ->join('trailers as t', 'o.trailer', '=', 't.id')->groupBy('o.ID_ZAMOWIENIA')
                                ->get();
                                }}
                               
                                        </div>
                                    <tr>     
                                @foreach($data as $item)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->suma_wag }}</td>
                                        <td>{{ $item->kubatura }}</td>
                                        <td>{{ $item->trailer }}</td>
                                        <td>{{ $item->ID_ZAMOWIENIA}}</td>
                                        <td>{{ $item->szerokosc }}</td>
                                        <td>{{ $item->dlugosc }}</td>
                                        <td>{{ $item->wysokosc }}</td>
                                        <div style="display: none">{{ $item->waga }}</div>
                                        <div style="display: none">{{$item ->ladunek}}</div>
                                        <td>
                                        <input type="button" value="Wybierz" onclick=" loadOrder({{$item->id}},{{$item->trailer}},{{ $item->szerokosc}},{{ $item->dlugosc}} ,{{ $item->wysokosc }},{{$item->waga}},{{$item->suma_wag}},{{json_encode($item->ladunek)}})">
                                            <form method="POST" action="{{ url('/orders' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
<a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>

@endsection