@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Renlakgiat
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>UPTD Terkait</th>
                            <th>Kejuruan</th>
                            <th>Program Pelatihan</th>
                            <th>Sumber Dana</th>
                            <th>Durasi</th>
                            <th>Paket</th>
                            <th>Orang</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $x=1; ?>
                        @foreach($renlakgiat as $data)
                            <tr>

                                <td>{{ $x++ }}</td>
                                <td>{{ $data->User->name }}</td>
                                <td>{{ $data->kejuruan }}</td>
                                <td>{{ $data->program_pelatihan }}</td>
                                <td>{{ $data->sumber_dana }}</td>
                                <td>{{ $data->durasi }}</td>
                                <td>{{ $data->paket }}</td>
                                <td>{{ $data->orang }}</td>
                                <td>{{ $data->tgl_mulai }}</td>
                                <td>{{ $data->tgl_selesai }}</td>
                                <td>
                                    <a href="{{url('/admin/renlakgiat/detail/'.$data->id)}}" name="detail"><button class="btn btn-primary"><i class="large material-icons">art_track</i></button></a>
                                    <a href="{{url('/admin/renlakgiat/edit/'.$data->id)}}"><button class="btn btn-primary"><i class="large material-icons">edit</i></button></a>
                                    <a href="{{url('/admin/renlakgiat/hapus/'.$data->id)}}"><button class="btn btn-danger"><i class="large material-icons">delete</i></button></a>
                                    <a href="{{url('/admin/renlakgiat/laporan/'.$data->id)}}"><button class="btn btn-warning"><i class="large material-icons">list</i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection
