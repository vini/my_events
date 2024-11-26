@extends('shared.layout')

@section('content')

<div class="col-lg-10">
    <h2>Bem-vindo, {{ Auth::user()->name }}</h2>
</div>

<div class="card card-calendar">
  <div class="card-body p-3">
    <div id='calendar'></div>
  </div>
</div>

@endsection