@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Profil UPTD
                </div>

                <div class="panel-body">
                    <table class="table" style="width: 100%">
                        <tr>
                            <th>No</th>
                            <th>Nama Lembaga</th>
                            <th>Eselonisasi</th>
                            <th>Provinsi</th>
                            <th>Kab/Kota</th>
                            <th>Alamat Lengkap</th>
                            <th>No Telepon</th>
                            <th>No Fax</th>
                            <th>Email Kantor</th>
                        </tr>
                        <?php $x=1; ?>
                        @foreach($profile as $data)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $data->nama_lembaga }}</td>
                                <td>{{ $data->eselonisasi }}</td>
                                <td>{{ $data->provinsi }}</td>
                                <td>{{ $data->kab_kota }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->no_telp }}</td>
                                <td>{{ $data->no_fax }}</td>
                                <td>{{ $data->email_kantor }}</td>
                                
                            </tr>
                        @endforeach
                    </table>
                    {{DB::table('profils')}}
                    @if($profile > 0)
                        <p>Diatas Merupakan Profil Anda</p>
                    @else
                        <p align="right">
                            <a href="{{ url('/profile/tambah')}}"><button class="btn btn-primary">Tambah Profile</button></a>
                        </p>
                    @endif    
                  
                    
                </div>
            </div>
                
    </div>
</div>
@endsection
