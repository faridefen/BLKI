@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Profil UPTD
                </div>
                <div class="well well-lg">
                    @foreach($profile as $data)
                        <img src="{{asset('upload/'.$data->foto_gedung)}}" style="width: 100%;">
                    @endforeach
                </div>
                <div class="panel-body">
                    <table class="table" style="width: 100%">
                        @foreach($profile as $data)
                            <tr>
                                <th>Nama Lembaga</th>
                                <td>{{ $data->nama_lembaga }}</td>
                            </tr>
                            <tr>
                                <th>Eselonisasi</th>
                                <td>{{ $data->eselonisasi }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>{{ $data->provinsi }}</td>
                            </tr>
                            <tr>
                                <th>Kab/Kota</th>
                                <td>{{ $data->kab_kota }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <td>{{ $data->alamat }}</td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <td>{{ $data->no_telp }}</td>
                            </tr>
                            <tr>
                                <th>No Fax</th>
                                <td>{{ $data->no_fax }}</td>
                            </tr>
                            <tr>
                                <th>Email Kantor</th>
                                <td>{{ $data->email_kantor }}</td>
                            </tr>
                            
                        
                        @endforeach
                    </table>
                   
                        @if($profile->count() > 0)
                             @foreach($profile as $data)
                                <p align="right">
                                    <a href="{{ url('/profile/edit/'.$data->id)}}"><button class="btn btn-primary">Edit Profile</button></a>
                                </p>
                            @endforeach
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
