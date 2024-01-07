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
        <a href="{{ route('users.create')}}" class="btn btn-secondary">Tambah Pembimbing siswa/Admin</a>
</div>
</div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($users as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['role'] }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('users.edit', $item['id'] )}}" class="btn btn-primary me-3">Edit</a>
                                        <form method="POST" action="{{ route('users.delete', $item['id']) }}" id="form-stock">
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