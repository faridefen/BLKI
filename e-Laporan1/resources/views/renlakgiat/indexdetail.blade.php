@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Renlakgiat
                </div>

                <div class="panel-body">
                    <table class="responsive-table">
                        @foreach($renlakgiat as $data)
                        <tr>
                            <th>UPTD Terkait</th>
                            <td>{{ $data->User->name }}</td>
                        </tr>
                        <tr>
                            <th>Kejuruan</th>
                            <td>{{ $data->kejuruan }}</td>
                        </tr>
                        <tr>
                            <th>Program Pelatihan</th>
                            <td>{{ $data->program_pelatihan }}</td>
                        </tr>
                        <tr>
                            <th>Sumber Dana</th>
                            <td>{{ $data->sumber_dana }}</td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <td>{{ $data->durasi }}</td>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <td>{{ $data->paket }}</td>
                        </tr>
                        <tr>
                            <th>Orang</th>
                            <td>{{ $data->orang }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td>{{ $data->tgl_mulai }}</td>
                        </tr>
                        <tr>
                            
                            <th>Tanggal Selesai</th>
                            <td>{{ $data->tgl_selesai }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>kosong</td>
                        </tr>
                        <tr>
                            <th>Laporan</th>
                            <td>link laporan</td>
                        </tr>
                        <tr>
                            <th>Aksi</th>
                            <td>
                                    <a href=""><button class="btn btn-primary"><i class="large material-icons">print</i></button></a>
                                    <a href="{{url('/admin/renlakgiat/edit/'.$data->id)}}"><button class="btn btn-primary"><i class="large material-icons">edit</i></button></a>
                                    <a href="{{url('/admin/renlakgiat/hapus/'.$data->id)}}"><button class="btn btn-danger"><i class="large material-icons">delete</i></button></a>
                                </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection
