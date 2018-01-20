@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Profile UPTD
                </div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Nama Lembaga</th>
                            <th>Eselonisasi</th>
                            <th>Kab/Kota - Provinsi</th>
                            <th>Nama Pimpinan</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $x=1; ?>
                        @foreach($profile as $data)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $data->nama_lembaga }}</td>
                                <td>{{ $data->eselonisasi }}</td>
                                <td>{{ $data->kab_kota }} - {{$data->provinsi}}</td>
                                <td>{{ $data->nama_pimpinan }}</td>
                                <td>
                                    <a href="{{url('admin/profile/detail/'.$data->id)}}"><button class="btn btn-primary">Detail</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection
