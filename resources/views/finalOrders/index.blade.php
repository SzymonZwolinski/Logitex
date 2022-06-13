@extends('orders.layout')
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
                    
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>naczepa</th>
                                        <th>tir</th>
                                        <th>Id zamówienia</th>
                                        <th>waga</th>
                                        <th>ilosc ladunku</th>
                                        <th>wolne miejsce (m^2)</th>
                                        <th>data dodania</th>

                                    </tr>
                                </thead>
                                <tbody>
                               
                                    

                                    <tr>     
                                @foreach($data as $item)

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id_naczepy }}</td>
                                        <td>{{ $item->id_pojazdu }}</td>
                                        <td>{{ $item->id_zamowienia }}</td>
                                        <td>{{ $item->waga }}</td>
                                        <td>{{ $item->ilosc_ladunku }}</td>
                                        <td>{{$item->kubatura}}</td>
                                        <td>{{ $item->data_dodania }}</td>
                                        
                                       
                                        <td>

                                            <a href="{{ url('/orders/' . $item->id) }}" title="View order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
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