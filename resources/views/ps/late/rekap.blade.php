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
            <a href="{{ route('ps.lates.export-excel') }}" class="btn btn-secondary">Cetak Excel</a>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('ps.lates.index') }}">Keseluruhan Data</a></li>
          <li class="breadcrumb-item"><a href="{{ route('ps.lates.rekap') }}">Rekapitulasi Data</a></li>
        </ol>
      </nav>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Jumlah keterlambatan</th>
                <th></th>
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            $uniqueNames = [];
            $countNames = collect($lates)
                ->groupBy('student.name')
                ->map->count();
        @endphp
        @foreach ($lates as $item)
            @if (!in_array($item['student']['name'], $uniqueNames))
                @php $uniqueNames[] = $item['student']['name']; @endphp
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['student']['name'] }}</td>
                    <td>{{ $item['student']['nis'] }}</td>
                    <td>{{ $countNames[$item['student']['name']] }}</td>
                    <td class="breadcrumb-item"><a href="{{ route('lates.detail', $item['student']['id']) }}">Detail</a></td>
                    <td><a href="{{ route('lates.print', $item['id']) }}" class="btn btn-primary me-3">Cetak Surat Pernyataan</a></td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection