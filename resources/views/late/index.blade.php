@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif

    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <a href="{{ route('lates.create') }}" class="btn btn-secondary">Tambah pengguna</a>
            <a href="{{ route('lates.export-excel') }}" class="btn btn-secondary">Cetak Excel</a>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('lates.index') }}">Keseluruhan Data</a></li>
          <li class="breadcrumb-item"><a href="{{ route('lates.rekap') }}">Rekapitulasi Data</a></li>
        </ol>
      </nav>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Information</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($lates as $item)
            {{-- @foreach ($students->where('id', $item['id']) as $student) --}}
                <tr> 
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['student']['name'] }}</td>
                    <td>{{ $item['date_time_late'] }}</td>
                    <td>{{ $item['information'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('lates.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('lates.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Kamu Yakin Mau Menghapus?');">Hapus</button>
                        </form>
                    </td>
                </tr> 
            {{-- @endforeach --}}
            @endforeach
        </tbody>
    </table>
@endsection