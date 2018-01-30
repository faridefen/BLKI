@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Dokumen Khusus
                </div>
                  
                     <a class="pull-right" align="right" href="{{route('dokumen.add')}}"><button class="btn btn-linkk">Tambah Dokumen Khusus</button></a>
                   
                <div class="panel-body">
                    <table class="responsive-table">
                        <tr>
                            <th>No</th>
                            <th>judul Dokumen</th>
                            <th>isi</th>
                            <th>Nama File</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $x=1; ?>
                        @foreach($dokumen as $data)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{{ $data->isi }}</td>
                                <td>{{ $data->file }}</td>
                                
                                <td>
                                   
                                </td>
                        @endforeach
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection