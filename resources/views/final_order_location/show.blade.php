@extends('cars.layout')
@section('content')
<div class="card">
  <div class="card-header">Podsumowanie zamówienia</div>
  <div class="card-body">
    <table class="table">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>id_naczepy</th>
                                          <th>id_pojazdu</th>
                                          <th>id_zamowienia</th>
                                          <th>waga</th>
                                          <th>ilosc_ladunku</th>
                                          <th>nadawca</th>
                                      </tr>
                                  </thead>
    <div style="display: none"> 
    <?php $components = strval($_GET['uuid']); ?>
    {{
      $tir = DB::table('final_orders', 'o')
      ->selectRaw("o.id_naczepy,o.id_pojazdu,o.id_zamowienia,o.waga,o.ilosc_ladunku, asd.nadawca")   
      ->rightJoin('orders as asd',"asd.ID_ZAMOWIENIA","=","o.id_zamowienia")
      ->whereRaw(("o.id_zamowienia = :somevariable"),array('somevariable'=> $components))->get();
    }}
    @foreach($tir as $item)
    <br>
    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id_naczepy }}</td>
                                        <td>{{ $item->id_pojazdu }}</td>
                                        <td>{{ $item->id_zamowienia }}</td>
                                        <td>{{ $item->waga}}</td>
                                        <td>{{ $item->ilosc_ladunku}}</td>
                                        <td>{{ $item->nadawca}}</td>
                                        <br>
  </tr>
    @endforeach
     </div>
  </div>
      
    </hr>
    <a href="{{url('/')}}"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>
  </div>
</div>