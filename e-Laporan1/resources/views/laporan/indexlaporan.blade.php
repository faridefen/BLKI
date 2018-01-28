@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Data Laporan
                </div>

                <div class="panel-body">
                    <table class="responsive-table">
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
                        <tr>
                            <td>No</td>
                            <td>UPTD Terkait</td>
                            <td>Kejuruan</td>
                            <td>Program Pelatihan</td>
                            <td>Sumber Dana</td>
                            <td>Durasi</td>
                            <td>Paket</td>
                            <td>Orang</td>
                            <td>Tanggal Mulai</td>
                            <td>Tanggal Selesai</td>
                            <td>
                                <a href="{{url('/laporan/detaillaporan')}}" ><i class="material-icons">art_track</i></a>
                                <a href="" ><i class="material-icons">edit</i></a>
                                <a href="" ><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection
