@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @foreach($renlakgiat as $data)
                    <table class="table">
                        <tr>
                            <td>Id</td>
                            <td>:</td>
                            <td>{{ $data->id }}</td>
                        </tr>
                        <tr>
                            <td>kejuruan</td>
                            <td>:</td>
                            <td>{{ $data->kejuruan }}</td>
                        </tr>
                        <tr>
                            <td>Program Pelatihan</td>
                            <td>:</td>
                            <td>{{ $data->program_pelatihan }}</td>
                        </tr>
                        <tr>
                            <td>Sumber Dana</td>
                            <td>:</td>
                            <td>{{ $data->sumber_dana }}</td>
                        </tr>
                        <tr>
                            <td>Durasi</td>
                            <td>:</td>
                            <td>{{$data->durasi}}</td>
                        </tr>
                        <tr>
                            <td>Pakte</td>
                            <td>:</td>
                            <td>{{$data->paket}}</td>
                        </tr>
                        <tr>
                            <td>Orang</td>
                            <td>:</td>
                            <td>{{$data->orang}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Mulai</td>
                            <td>:</td>
                            <td>@if($data->tgl_mulai == "") UPTD/BLK terkait belum Mengisi data tanggal @else {{date('d M Y', strtotime($data->tgl_mulai))}} @endif</td>
                        </tr>
                        <tr>
                            <td>Tanggal Selesai</td>
                            <td>:</td>
                            <td> @if($data->tgl_selesai == "") UPTD/BLK terkait belum Mengisi data tanggal @else {{date('d M Y', strtotime($data->tgl_selesai))}} @endif</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
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
                        </tr>
                        
                        <tr>
                            <td>Laporan</td>
                            <td>:</td>
                            <td>
                                
                                <a href="{{url('uptd/renlakgiat/laporan/cover/tambah/'.$data->id)}}"><button class="btn btn-link">cover</button></a> {{$data->cover}},<strong>Status:</strong>  {{ $data->status_cover}}, <strong> Catatan:</strong> {{ $data->catatan_cover}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/pendahuluan/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">pengantar, pendahuluan dan isi laporan</button>
                                </a>
                                {{$data->pendahuluan}}, <strong>Status:</strong> {{$data->status_pendahuluan}} <strong>Catatan:</strong> {{ $data->catatan_pendahuluan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/sk/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">Surat Keputusan</button>
                                </a>{{$data->surat_keputusan}} <strong>Status</strong> {{$data->status_surat_keputusan}} <strong>Catatan</strong> {{$data->catatan_surat_keputusan}}<br>
                                <a href="{{url('uptd/renlakgiat/laporan/npp/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">Nominatif Perserta Pelatihan</button>
                                </a>
                                {{$data->nominatif_peserta_pelatihan}}, <strong>Status:</strong> {{$data->status_nominatif_peserta_pelatihan}} <strong>Catatan:</strong> {{ $data->catatan_nominatif_peserta_pelatihan}}
                                <br>
                                <a href="{{url('uptd/renlakgiat/laporan/ni/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">nominatif instruktur</button>
                                </a>{{$data->nominatif_instruktur}}, <strong>Status:</strong> {{$data->status_nominatif_instruktur}} <strong>Catatan:</strong> {{ $data->catatan_nominatif_instruktur}}
                                <br>
                                <button class="btn btn-link">kurikulum</button><br>
                                <button class="btn btn-link">jadwal pelatihan mingguan</button><br>
                                <button class="btn btn-link">Daftar hadir instruktur</button><br>
                                <button class="btn btn-link">daftar jam mengajar instruktur</button><br>
                                <button class="btn btn-link">daftar hadir peserta pelatihan</button><br>
                                <button class="btn btn-link">daftar permintaan bahan latihan</button><br>
                                <button class="btn btn-link">bukti penerimaan bahan pelatihan</button><br>
                                <button class="btn btn-link">laporan mingguan penggunaan bahan latihan</button><br>
                                <button class="btn btn-link">undangan sidang kelulusan</button><br>
                                <button class="btn btn-link">berita acara sidang kelulusan</button><br>
                                <button class="btn btn-link">daftar hadir pertemuan sidang kelulusan</button><br>
                                <button class="btn btn-link">daftar nilai akhir</button><br>
                                <button class="btn btn-link">Rekap Penilaian Pelatihan Berbasis Kompetensi</button><br>
                                <button class="btn btn-link">Rekapitulasi Akhir Hasil Pelatihan</button><br>
                                <button class="btn btn-link">tanda terima transport peserta</button><br>
                                <button class="btn btn-link">Tanda Terima Kartu Asuransi Peserta</button><br>
                                <button class="btn btn-link">tanda terima pakaian kerja perserta</button><br>
                                <button class="btn btn-link">tanda terima atk peserta</button><br>
                                <button class="btn btn-link">tanda terima modul</button><br>
                                <button class="btn btn-link">tanda terima konsumsi perserta</button><br>
                                <button class="btn btn-link">foto dokumentasi kegiatan</button><br>
                                <button class="btn btn-link">fotocopy sertifikasi peserta</button><br>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
