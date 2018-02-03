@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Dashboard Detail Renlakgiat dan Laporan</strong></div>

                <div class="panel-body">
                    @foreach($renlakgiat as $data)
                    <table class="table">
                        <tr>
                            <td width="355">Id Renlakgiat</td>
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
                            <td>Paket</td>
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
                            <td>Laporan</td>
                            <td>:</td>
                            <td align="center">
                                
                                <a href="{{url('uptd/renlakgiat/laporan/cover/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">cover</button>
                                </a><br> 
                                <strong>File: </strong>{{$data->cover}}<br>
                                <strong>Status:</strong> {{ $data->status_cover}}<br> 
                                <strong> Catatan:</strong> {{ $data->catatan_cover}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/pendahuluan/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">pengantar, pendahuluan dan isi laporan</button>
                                </a><br>
                                <strong>File: </strong>{{$data->pendahuluan}}<br> 
                                <strong>Status:</strong> {{$data->status_pendahuluan}}<br> 
                                <strong>Catatan:</strong> {{ $data->catatan_pendahuluan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/sk/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">Surat Keputusan</button>
                                </a><br>
                                <strong>File: </strong>{{$data->surat_keputusan}}<br> 
                                <strong>Status</strong> {{$data->status_surat_keputusan}}<br> 
                                <strong>Catatan</strong> {{$data->catatan_surat_keputusan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/npp/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">Nominatif Perserta Pelatihan</button>
                                </a><br>
                                <strong>File: </strong>{{$data->nominatif_peserta_pelatihan}}<br>
                                <strong>Status:</strong> {{$data->status_nominatif_peserta_pelatihan}}<br> 
                                <strong>Catatan:</strong> {{ $data->catatan_nominatif_peserta_pelatihan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/ni/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">nominatif instruktur</button>
                                </a><br>
                                <strong>File: </strong>{{$data->nominatif_instruktur}}<br> 
                                <strong>Status:</strong> {{$data->status_nominatif_instruktur}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_nominatif_instruktur}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/kurikulum/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">kurikulum</button>
                                </a><br>
                                <strong>File: </strong>{{$data->kurikulum}}<br> 
                                <strong>Status:</strong> {{$data->status_kurikulum}}<br> 
                                <strong>Catatan:</strong>{{ $data->catatan_kurikulum}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/jpm/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">jadwal pelatihan mingguan</button>
                                </a><br>
                                <strong>File: </strong>{{$data->jadwal_pelatihan_mingguan}}<br> 
                                <strong>Status:</strong> {{$data->status_jadwal_pelatihan_mingguan}}<br> 
                                <strong>Catatan:</strong> {{ $data->catatan_jadwal_pelatihan_mingguan}}
                                <br>


                                <a href="{{url('uptd/renlakgiat/laporan/dhi/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">Daftar hadir instruktur</button>
                                </a><br>
                                <strong>File: </strong>{{$data->daftar_hadir_instruktur}}<br> 
                                <strong>Status:</strong> {{$data->status_daftar_hadir_instruktur}}<br> 
                                <strong>Catatan:</strong> {{ $data->catatan_daftar_hadir_instruktur}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/djmi/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">daftar jam mengajar instruktur</button>
                                </a> <br>
                                <strong>File: </strong>{{$data->daftar_jam_mengajar_instruktur}}<br> 
                                <strong>Status:</strong> {{$data->status_daftar_jam_mengajar_instruktur}}<br> 
                                <strong>Catatan:</strong> {{ $data->catatan_daftar_jam_mengajar_instruktur}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/dhpp/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">daftar hadir peserta pelatihan</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->daftar_hadir_peserta_pelatihan}}<br>
                                <strong>Status:</strong> {{$data->status_daftar_hadir_peserta_pelatihan}}<br> 
                                <strong>Catatan:</strong> {{ $data->catatan_daftar_hadir_peserta_pelatihan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/dpbl/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">daftar permintaan bahan latihan</button>
                                </a><br>
                                <strong>File: </strong>{{$data->daftar_permintaan_bahan_latihan}}<br> 
                                <strong>Status:</strong> {{$data->status_daftar_permintaan_bahan_latihan}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_daftar_permintaan_bahan_latihan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/bpbl/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">bukti penerimaan bahan pelatihan</button>
                                </a><br>
                                <strong>File: </strong>{{$data->bukti_penerimaan_bahan_pelatihan}}<br> 
                                <strong>Status:</strong> {{$data->status_bukti_penerimaan_bahan_pelatihan}}<br> 
                                <strong>Catatan:</strong> {{ $data->catatan_bukti_penerimaan_bahan_pelatihan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/lmpbl/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">laporan mingguan penggunaan bahan latihan</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->laporan_mingguan_penggunaan_bahan_latihan}}<br>
                                <strong>Status:</strong> {{$data->status_laporan_mingguan_penggunaan_bahan_latihan}} <br>
                                <strong>Catatan:</strong> {{ $data->catatan_laporan_mingguan_penggunaan_bahan_latihan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/usk/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">undangan sidang kelulusan</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->undangan_sidang_kelulusan}}<br>
                                <strong>Status:</strong> {{$data->status_undangan_sidang_kelulusan}} <br>
                                <strong>Catatan:</strong> {{ $data->catatan_undangan_sidang_kelulusan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/bask/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">berita acara sidang kelulusan</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->berita_acara_sidang_kelulusan}}<br>
                                <strong>Status:</strong> {{$data->status_berita_acara_sidang_kelulusan}} <br>
                                <strong>Catatan:</strong> {{ $data->catatan_berita_acara_sidang_kelulusan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/dhpsk/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">daftar hadir pertemuan sidang kelulusan</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->daftar_hadir_pertemuan_sidang_kelulusan}}<br>
                                <strong>Status:</strong> {{$data->status_daftar_hadir_pertemuan_sidang_kelulusan}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_daftar_hadir_pertemuan_sidang_kelulusan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/dna/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">daftar nilai akhir</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->daftar_nilai_akhir}}<br>
                                <strong>Status:</strong> {{$data->status_daftar_nilai_akhir}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_daftar_nilai_akhir}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/rppbk/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">Rekap Penilaian Pelatihan Berbasis Kompetensi</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->rekap_penilaian_pelatihan_berbasis_kompetensi}}<br>
                                <strong>Status:</strong> {{$data->status_rekap_penilaian_pelatihan_berbasis_kompetensi}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_rekap_penilaian_pelatihan_berbasis_kompetensi}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/rahp/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">Rekapitulasi Akhir Hasil Pelatihan</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->rekapitulasi_akhir_hasil_pelatihan}}<br>
                                <strong>Status:</strong> {{$data->status_rekapitulasi_akhir_hasil_pelatihan}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_rekapitulasi_akhir_hasil_pelatihan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/tttp/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">tanda terima transport peserta</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->tanda_terima_transport_peserta}}<br>
                                <strong>Status:</strong> {{$data->status_tanda_terima_transport_peserta}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_tanda_terima_transport_peserta}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/ttap/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">Tanda Terima Kartu Asuransi Peserta</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->tanda_terima_asuransi_peserta}}<br>
                                <strong>Status:</strong> {{$data->status_tanda_terima_asuransi_peserta}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_tanda_terima_asuransi_peserta}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/ttpkp/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">tanda terima pakaian kerja perserta</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->tanda_terima_pakaian_kerja_peserta}}<br>
                                <strong>Status:</strong> {{$data->status_tanda_terima_pakaian_kerja_peserta}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_tanda_terima_pakaian_kerja_peserta}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/ttatkp/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">tanda terima atk peserta</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->tanda_terima_atk_peserta}}<br>
                                <strong>Status:</strong> {{$data->status_tanda_terima_atk_peserta}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_tanda_terima_atk_peserta}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/ttm/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">tanda terima modul</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->tanda_terima_modul}}<br>
                                <strong>Status:</strong> {{$data->status_tanda_terima_modul}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_tanda_terima_modul}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/ttkp/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">tanda terima konsumsi perserta</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->tanda_terima_konsumsi_peserta}}<br>
                                <strong>Status:</strong> {{$data->status_tanda_terima_konsumsi_peserta}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_tanda_terima_konsumsi_peserta}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/fdk/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">foto dokumentasi kegiatan</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->foto_dokumentasi_kegiatan}}<br>
                                <strong>Status:</strong> {{$data->status_foto_dokumentasi_kegiatan}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_foto_dokumentasi_kegiatan}}
                                <br>

                                <a href="{{url('uptd/renlakgiat/laporan/fsp/tambah/'.$data->id)}}">
                                    <button class="btn btn-link">fotocopy sertifikasi peserta</button>
                                </a>
                                <br>
                                <strong>File: </strong>{{$data->fotocopy_sertifikasi_peserta}}<br>
                                <strong>Status:</strong> {{$data->status_fotocopy_sertifikasi_peserta}}<br>
                                <strong>Catatan:</strong> {{ $data->catatan_fotocopy_sertifikasi_peserta}}
                                <br>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                    @foreach($renlakgiat as $data)
                        @if($data->cover == "" or $data->pendahuluan == "" or $data->surat_keputusan == "" or $data->nominatif_peserta_pelatihan == ""or $data->nominatif_instruktur == "" or $data->kurikulum == "" or $data->jadwal_pelatihan_mingguan == "" or $data->daftar_hadir_instruktur == "" or $data->daftar_jam_mengajar_instruktur == "" or $data->daftar_hadir_peserta_pelatihan == "" or $data->daftar_permintaan_bahan_latihan == "" or $data->bukti_penerimaan_bahan_pelatihan == "" or $data->laporan_mingguan_penggunaan_bahan_latihan == "" or $data->undangan_sidang_kelulusan == "" or $data->berita_acara_sidang_kelulusan == "" or $data->daftar_hadir_pertemuan_sidang_kelulusan == "" or $data->daftar_nilai_akhir == ""or $data->rekap_penilaian_pelatihan_berbasis_kompetensi == "" or $data->rekapitulasi_akhir_hasil_pelatihan == "" or $data->tanda_terima_transport_peserta == "" or $data->tanda_terima_asuransi_peserta == "" or $data->tanda_terima_pakaian_kerja_peserta == "" or $data->tanda_terima_atk_peserta == "" or $data->tanda_terima_modul == ""or $data->tanda_terima_konsumsi_peserta == "" or $data->foto_dokumentasi_kegiatan == "" or $data->fotocopy_sertifikasi_peserta == "")
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button class="btn btn-danger" disabled>Kirim</button>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button class="btn btn-success">Kirim</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
