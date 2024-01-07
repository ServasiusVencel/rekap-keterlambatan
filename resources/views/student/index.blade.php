@extends('layouts.template')

@section('content')
<div id="msg-success"></div>
@if(Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

<div class="d-flex flex-row-reverse">
    <div class="p-2">
        <a href="{{ route('students.create')}}" class="btn btn-secondary">Tambah Data Siswa</a>
</div>
</div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($students as $item)

        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item['nis'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['rombel']['rombel'] }}</td>
            <td>{{ $item['rayon']['rayon'] }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('students.edit', $item['id'] )}}" class="btn btn-primary me-3">Edit</a>
                                        <form method="POST" action="{{ route('students.delete', $item['id']) }}" id="form-stock">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                         </form>
                                    </div>
                            </div>
                        </div>
                    
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    @endsection