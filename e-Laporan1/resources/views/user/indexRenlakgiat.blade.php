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
                            <th>Kejuruan</th>
                            <th>Program Pelatihan</th>
                            <th>Sumber Dana</th>
                            <th>Durasi</th>
                            <th>Paket</th>
                            <th>Orang</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Data PKTP</th>
                            <th>Laporan</th>
                            <th>Cetak Renlakgiat</th>
                            <th></th>   
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
                                <td>@if($data->tgl_mulai == "") Silahkan Mengisi data tanggal @else {{date('d M Y', strtotime($data->tgl_mulai))}} @endif</td>
                                <td>@if($data->tgl_selesai == "") Silahkan Mengisi data tanggal @else {{date('d M Y', strtotime($data->tgl_selesai))}} @endif</td>
                                    
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
                                    <a href="{{url('uptd/renlakgiat/edit/'.$data->id)}}"><button class="btn btn-warning"><span class="material-icons">edit</span></button></a>
                                    @else
                                    <h6>silahkan hubungi admin untuk mengubah tanggal</h6>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('uptd/pktp/'.$data->id)}}"><button class="btn btn-primary"><span class="material-icons">list</span></button></a>
                                </td> 
                                <td>
                                    <a href="{{url('uptd/laporan/detail/'.$data->id)}}"><button class="btn btn-info"><span class="material-icons">details</span></button></a>
                                </td>
                                <td>
                                    <a href="{{url('uptd/renlakgiat/cetak/'.$data->id)}}"><button class="btn btn-info"><span class="material-icons">font_download</span></button></a>
                                
                                </td>  
                                    
                        @endforeach
                    </table>
                    {{ $renlakgiat->links() }}
                </div>
            </div>
        
    </div>
</div>
@endsection
