@extends('layouts.template')

@section('content')
 <form action="{{ route('users.store') }}" method="POST" class="card p-5">
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
    <label for="name" class="col-sm-2 col-form-label">Nama :</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="name" autocomplete="off">
    </div>
</div>

<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email :</label>
    <div class="col-sm-10">
        <input type="Email" class="form-control" name="email" id="email" autocomplete="off">
    </div>
</div>

<div class="mb-3 row">
    <label for="password" class="col-sm-2 col-form-label">Password :</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" name="password" id="password" autocomplete="off">
    </div>
</div>

<div class="mb-3 row">
    <label for="role" class="col-sm-2 col-form-label">Role :</label>
    <div class="col-sm-10">
        <select class="form-select" name="role" id="role">
            <option selected disabled hidden>Pilih Role</option>
            <option value="ps">Pembimbing Siswa</option>
            <option value="admin">Admin</option>
        </select>
    </div>
</div>

    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
</form>
@endsection