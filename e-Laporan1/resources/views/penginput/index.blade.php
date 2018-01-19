@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Laporan Bidang {{Auth::user()->name}} 
                </div>

                <div class="panel-body">
                    <div class="right"><a href="{{url('/penginput/tambah')}}"><button class="btn btn-primary">Upload</button></a></div><br>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Nama Laporan</th>
                            <th>Nama File</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Nama Bidang</th>
                        </tr>
                        <?php $x=1; ?>
                        @foreach($laporan as $data)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $data->namafile }}</td>
                                <td>{{ $data->file }}</td>
                                
                                    @if($data->status == 'Fix')
                                    <td><strong class="alert-success">{{ $data->status }}</strong></td>
                                    @elseif($data->status == 'Revisi')
                                    <td><strong class="alert-danger">{{ $data->status }}</strong></td>
                                    @endif
                                

                                <td>{{ $data->catatan }}</td>
                                <td>{{ $data->User->name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
