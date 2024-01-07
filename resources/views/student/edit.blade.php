@extends('layouts.template')

@section('content')
    <form action="{{ route('students.update', $students['id'] )}}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">Nis :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nis" id="nis" autocomplete="off" value="{{ $students['nis'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ $students['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Rombel :</label>
            <div class="col-sm-10">
                <select class="form-select" name="rombel_id" id="type">
                    <option selected disabled hidden>Pilih</option>
                    @foreach ($rombels as $item)
                        <option value="{{ $item['id'] }}">{{ $item['rombel'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Rayon :</label>
            <div class="col-sm-10">
                <select class="form-select" name="rayon_id" id="type">
                    <option selected disabled hidden>Pilih</option>
                    @foreach ($rayons as $item)
                        <option value="{{ $item['id'] }}">{{ $item['rayon'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection