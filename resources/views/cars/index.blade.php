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
                        <h1>Zamówienie zapisano</h1>
                        <h2>Kreator zamówień</h2>
						<h3>Krok 3: Wybierz tir</h3>
                    </div>

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
                                    ->whereRaw('(dopuszczalna_masa >= (select suma_wag from orders order by id desc limit 1)) AND P_dostepnosc =1')
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
    <a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>

@endsection