@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard PKTP
                     
                     
                    
                </div>

                <div class="panel-body">
                    <table class="table">

                        <tr>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Pangkat</th>
                            <th>Jabatan</th>
                            <th>Kedudukan Tim</th>
                            <th>Alamat</th>
                            <th>No. Hp</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $x=1; ?>
                        @foreach($pktp as $data)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->pangkat }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->kedudukan }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->nohp }}</td>
                                <td><img src="{{asset('upload/'.$data->foto)}}" width="150" height="150"></td>
                                <td>
                                    <a href=""><i class="material-icons">more</i></a>
                                    <a href="{{url('uptd/pktp/hapus/'.$data->id)}}"><i style="color: red" class="material-icons">delete</i></a>
                                </td>
                        @endforeach
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection