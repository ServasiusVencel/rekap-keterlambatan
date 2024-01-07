@extends('layouts.template')

@section('content')

<div class="flex justify-center">
    <h1 class="text-2xl font-bold">Selamat Datang {{ Auth::user()->name }} !</h1>
</div>
    <style>
        .card {
            width: 600px;
            height: 140px;
            margin: 10px;
            padding: 20px;
            box-sizing: border-box;
            font-size: 16px;
            border-radius: 10px;
            box-shadow: 2px 4px 2px 1px rgba(0, 0, 0, 0.1);
        }
        .card-container {
            margin-top: 130px;
            margin-left: 30px;
            display: flex;
            flex-wrap: wrap;
        }
    </style>
  @if(Session::get('alreadyAccess'))
      <div class="alert alert-primary" style="margin-top: 90px;">{{ Session::get('alreadyAccess') }}</div>
  @endif  
<div class="card-container">
    <div class="card">
      <p>Peserta Didik</p>
      <h1><i class="fa fa-user" style="color: blue;"></i> {{ $totalstudents }}</h1>
    </div>
    <div class="card" style="width: 290px;">
      <p>Administrator</p>
      <h1><i class="fa fa-user" style="color: blue;"></i> {{ $totaladmins }}</h1>
    </div>
    <div class="card" style="width: 290px;">
      <p>Pembimbing siswa</p>
      <h1><i class="fa fa-user" style="color: blue;"></i> {{ $totalps }} </h1>
    </div>
    <div class="card">
      <p>Rombel</p>
      <h1><i class="fa fa-bookmark" style="color: blue;"></i> {{ $totalrombels }} </h1>
    </div>
    <div class="card">
      <p>Rayon</p>
      <h1><i class="fa fa-bookmark" style="color: blue;"></i> {{ $totalrayons }} </h1>
    </div>
</div>

@endsection