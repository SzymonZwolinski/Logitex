@extends('cars.layout')
@section('content')
<head>
    <!-- Head Contents -->
    <script src="../../js/handler.js"></script>
</head>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista pojazdów w firmie</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/final_order_location/create') }}" class="btn btn-success btn-sm" title="Add New Vehicle">
                            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj pojazd
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>marka</th>
                                        <th>model</th>
                                        <th>dopuszczalna_masa</th>
                                        <th>aktualna_masa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <div style="display: none"> 
                                    <?php if(isset($_GET['uuid']))
                                    {
                                        $components = strval($_GET['uuid']);
                                     } ?>
                                    {{
                                      

                                    $tir = DB::table('cars')
                                    ->selectRaw('id, marka, model, dopuszczalna_masa, (select suma_wag from orders where ID_ZAMOWIENIA = :somevariable limit 1 ) as aktualna_masa',array('somevariable'=> $components))
                                    ->whereRaw('(dopuszczalna_masa >= (select waga from orders order by id desc limit 1)) AND P_dostepnosc =1')
                                    ->get();
                                    }}</div>
                                    <?php $components = '"'.$components.'"';?>
                                @foreach($tir as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->marka }}</td>
                                        <td>{{ $item->model }}</td>
                                        <td>{{ $item->dopuszczalna_masa }}</td>
                                        <td>{{ $item->aktualna_masa}}</td>
                               
                                        <td>
                                        
                                           <button type="button" name="wybierz" value="wybierz" onclick="zapis({{$item->id}},{{ $components }})">Wybierz</button>
                                            <a href="{{ url('/cars/' . $item->id) }}" title="View Vehicle"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Podgląd</button></a>
                                            <a href="{{ url('/cars/' . $item->id . '/edit') }}" title="Edit Vehicle"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</button></a>
                                            <form method="POST" action="{{ url('/vehicle' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Vehicle" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Usuń</button>
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