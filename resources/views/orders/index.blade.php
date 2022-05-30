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
                    <div class="card-body">
                        <a href="{{ url('/orders/create') }}" class="btn btn-success btn-sm" title="Add New order">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>waga</th>
                                        <th>naczepa</th>
                                        <th>szerokosc</th>
                                        <th>dlugosc</th>
                                        <th>wysokosc</th>

                                    </tr>
                                </thead>
                                <tbody>
                               
                                    
                                        <div style="display: none">
                                 
                                        {{$data = DB::table('orders as o')
                                ->select('o.id','o.trailer','o.waga','t.szerokosc', 't.dlugosc', 't.wysokosc','o.ladunek')
                                ->join('trailers as t', 'o.trailer', '=', 't.id')
                                ->get();}}
                               
                                        </div>
                                    <tr>     
                                @foreach($data as $item)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->waga }}</td>
                                        <td>{{ $item->trailer }}</td>
                                        <td>{{ $item->szerokosc }}</td>
                                        <td>{{ $item->dlugosc }}</td>
                                        <td>{{ $item->wysokosc }}</td>
                                        <div style="display: none">< {{$item ->ladunek}}</div>
                                        <td>
                                        <input type="button" value="Wybierz" onclick=" loadOrder({{$item->id}},{{$item->trailer}},{{ $item->szerokosc}},{{ $item->dlugosc}} ,{{ $item->wysokosc }},{{$item->waga}},{{json_encode($item->ladunek)}})">
                                            <a href="{{ url('/orders/' . $item->id) }}" title="View order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/orders/' . $item->id . '/edit') }}" title="Edit order"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
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
@endsection