@extends('layouts.template')

@section('content')
<div id="msg-success"></div>
@if(Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif


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