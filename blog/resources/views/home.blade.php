@extends('layouts.app')
@section('content')
<div id="all">
@if(session('msg'))
    <div class="alert alert-success">
        <p>{{session('msg')}}</p>
    </div>
@endif
<div id="options">

<div id="input">
<h2>input your CSV file</h2>

<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <p class="file-return"></p>
  <div class="input-file-container">
    <input class="input-file" id="my-file" type="file" accept=".csv" name="csv_file">
    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
  </div>

  <button id="send" type="submit" class="btn btn-primary">
    send CSV
</button>
</form>
</div>
<div id="get">
    <h2>See your Data Base</h2>
<form action="{{ route('get') }}" method="get" >
    {{ csrf_field() }}
<button id="see" type="submit" class="btn btn-primary">
    see
</button>
</div>

</div>
</div>
@endsection

