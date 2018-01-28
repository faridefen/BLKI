@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Renlakgiat
                </div>

                <div class="panel-body">
                    <table class="responsive-table">
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
                            <th>Status</th>
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
                                    
                                @if($data->tgl_mulai == "")
                                <td>Belum Direncanakan</td>
                                @else
                                    @if(Carbon\Carbon::now() < $data->tgl_mulai)
                                    
                                        <?php DB::table('renlakgiats')
                                            ->where('id', $data->id)
                                            ->update(['status' => 'Belum Berjalan']); ?>
                                           <td> Belum Berjalan</td>
                                    
                                    @elseif(Carbon\Carbon::now() > $data->tgl_selesai)
                                    
                                        <?php DB::table('renlakgiats')
                                                ->where('id', $data->id)
                                                ->update(['status' => 'Sudah Selesai']) ?>
                                        <td> Sudah Selesai</td>
                                    
                                    @else
                                    
                                        <?php DB::table('renlakgiats')
                                                ->where('id', $data->id)
                                                ->update(['status' => 'Sedang Berjalan']) ?>

                                        <td> Sedang Berjalan</td>

                                    @endif
                                @endif
                                <td>
                                    @if($data->tgl_mulai=="" && $data->tgl_selesai=="")
                                    <a href="{{url('uptd/renlakgiat/edit/'.$data->id)}}"><button class="btn btn-warning">Edit</button></a>
                                    @else
                                    <h6>silahkan hubungi admin untuk edit</h6>
                                    @endif
                                    <a href="{{url('uptd/pktp/'.$data->id)}}"><button class="btn btn-primary">Data PKTP</button></a>
                                    <a href="{{url('uptd/laporan/detail/'.$data->id)}}"><button class="btn btn-info">Detail</button></a>
                                </td>
                        @endforeach
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection