@extends('layouts.template')

@section('content')
 <form action="{{ route('rombels.store') }}" method="POST" class="card p-5">
    @csrf

    @if(Session::get('success'))
    <div class="alert alert-success mt-3">{{ Session::get('success')}}</div>
    @endif
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach 
        </ul>
        @endif


<div class="mb-3 row">
    <label for="rombel" class="col-sm-2 col-form-label">Rombel :</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="rombel" id="rombel" autocomplete="off">
    </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
</form>
@endsection