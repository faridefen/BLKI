@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Renlakgiat <a href="{{route('admin.renlakgiat.add')}}" class="pull-right"><span class="medium material-icons">control_point</span></a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>No</th>
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
                                <td>{{ $data->kejuruan }}</td>
                                <td>{{ $data->program_pelatihan }}</td>
                                <td>{{ $data->sumber_dana }}</td>
                                <td>{{ $data->durasi }}</td>
                                <td>{{ $data->paket }}</td>
                                <td>{{ $data->orang }}</td>
                                <td>{{ $data->tgl_mulai }}</td>
                                <td>{{ $data->tgl_selesai }}</td>
                                <td>
                                    <a href="{{url('/admin/renlakgiat/edit/'.$data->id)}}"><button class="btn btn-primary">Edit</button></a>
                                    <a href="{{url('/admin/renlakgiat/hapus/'.$data->id)}}"><button class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection
