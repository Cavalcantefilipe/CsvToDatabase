@extends('layouts.see')
@section('content')
<div id="all">
<div class="container box">
    <h1 align="center">Data base</h1>
    <br />
    <div id="filters">
    <form action="{{ route('filters') }}"  method="POST" enctype = "multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group input-daterange">
            <input id="startDate1" name="startDate1" type="text"
                class="form-control" readonly="readonly" value="{{ $date['min']}}"> <span
                class="input-group-addon"> <span
                class="glyphicon glyphicon-calendar"></span>
            </span> <span class="input-group-addon">to</span> <input id="endDate1"
                name="endDate1" type="text" class="form-control" readonly="readonly" value="{{ $date['max'] }}">
            <span class="input-group-addon"> <span
                class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
        <input id="nameClient" name="nameClient" type="text" class="form-control" placeholder="nameClient"  value="">
        <input id="idClient" name="idClient" type="number" class="form-control" placeholder="idClient" value="">
        <input id="deal" name="deal" type="text" class="form-control" placeholder="deal" value="">
        <input id="idDeal" name="idDeal" type="number" class="form-control" placeholder="idDeal" value="">
        <select id="group" aling="center" name="orderBy" placeholder="orderBy" value="">
            <option value=""></option>
            <option value="hour">Hour</option>
            <option value="day">Day</option>
            <option value="month">month</option>
          </select>
          <button id="butFilter" type="submit" class="btn btn-primary">Filter</button>
    </form>
    </div>
    <div class="table">
     <br />
     <table id="order_data" class="table table-bordered table-striped" >
      <thead>


        <tr>
         <th colspan="2">total-></th>
         <th colspan="2">clients :      {{ $total->totalclients }}</th>
         <th colspan="2"> deals : {{ $total->totalDeal }}</th>
         <th>{{ $total->totalac }}</th>
         <th>{{ $total->totalrj }}</th>
        </tr>
       <tr>
        <th>Order ID</th>
        <th>Name Client</th>
        <th>id Client</th>
        <th>Deal</th>
        <th>id Deal</th>
        <th>Order Date</th>
        <th>accepted</th>
        <th>rejected</th>
       </tr>
       @foreach($datas as $data)
       <tr>
        <th>{{ $data->idOrder }}</th>
        <th>{{ $data->name }}</th>
        <th>{{ $data->idClient }}</th>
        <th>{{ $data->description }}</th>
        <th>{{ $data->idDeal }}</th>
        <th>{{ $data->date }}</th>
        <th>{{ $data->accepted }}</th>
        <th>{{ $data->rejected }}</th>
       </tr>
       @endforeach

      </thead>
     </table>

    </div>
   </div>
</div>
@endsection
