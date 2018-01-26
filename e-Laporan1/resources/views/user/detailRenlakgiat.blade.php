@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                            <td>{{date('d M Y', strtotime($data->tgl_mulai))}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Selesai</td>
                            <td>:</td>
                            <td> {{date('d M Y', strtotime($data->tgl_selesai))}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>{{ $data->status }}</td>
                        </tr>
                        <tr>
                            <td>Upload Laporan</td>
                            <td>:</td>
                            <td>
                                @if(DB::table('laporans')->select('id','status','catatan')-> where('nama_laporan','like','%cover%')->where('renlakgiat_id',$data->id)->count() > 0)

                                    @foreach(DB::table('laporans')-> where('nama_laporan','like','%cover%')->where('renlakgiat_id',$data->id)->get() as $lp)
                                        <a href="{{url('uptd/renlakgiat/laporan/cover/edit/'.$lp->id)}}"><button class="btn btn-link">cover</button></a>
                                            @foreach(DB::table('laporans')->select('status','catatan')-> where('nama_laporan','like','%cover%')->where('renlakgiat_id',$data->id)->get() as $lp)
                                    Status: {{$lp->status}}; Catatan: {{$lp->catatan}}
                                @endforeach
                                    @endforeach
                                @else
                                    <a href="{{url('uptd/renlakgiat/laporan/cover/tambah/'.$data->id)}}"><button class="btn btn-link">cover</button></a>
                                @endif
                                <br>
                                <button class="btn btn-link">pengantar, pendahuluan dan isi laporan</button><br>
                                <button class="btn btn-link">Surat Keputusan</button><br>
                                <button class="btn btn-link">Nominatif Perserta Pelatihan</button><br>
                                <button class="btn btn-link">nominatif instruktur</button><br>
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
                            </td>
                        </tr>
                    </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
