@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Laporan</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{url('admin/renlakgiat/simpan/')}}" method="POST"  enctype="multipart/form-data">
                    	{{ csrf_field() }}
                               
                                <div class="form-group{{ $errors->has('users_id') ? 'has-error': ''}}">
                                    
                                       <!--  <div class="col-md-6">
                                        @foreach($user as $data)
                                            <input type="hidden" name="users_id" id="users_id" class="form-control" value="{{ $data->users_id }}" readonly required>
                                        @endforeach -->
                                        </div>
                                   
                                        <!--  @if ($errors->has('users_id')) -->
                                            <span class="help-block">
                                                <strong>{{ $errors->first('users_id') }}</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>

                    		    <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Kejuruan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>kejuruan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                    			<div class="form-group{{ $errors->has('program_pelatihan') ? 'has-error': ''}}">
                                    <label for="program_pelatihan" class="col-md-4 control-label">Program Pelatihan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="program_pelatihan" id="program_pelatihan" class="form-control" required>
                                        </div>

                                        <!--  @if ($errors->has('program_pelatihan')) -->
                                            <span class="help-block">
                                                <strong>program pelatihan</strong>
                                            </span>
                                       <!--  @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('sumber_dana') ? 'has-error': ''}}">
                                    <label for="sumber_dana" class="col-md-4 control-label">Sumber Dana</label>
                                        <div class="col-md-6">
                                            <input type="text" name="sumber_dana" id="sumber_dana" class="form-control" required>
                                        </div>

                                       <!--   @if ($errors->has('sumber_dana')) -->
                                            <span class="help-block">
                                                <strong>sumber dana</strong>
                                            </span>
                                       <!--  @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('durasi') ? 'has-error': ''}}">
                                    <label for="durasi" class="col-md-4 control-label">Durasi</label>
                                        <div class="col-md-6">
                                            <input type="text" name="durasi" id="durasi" class="form-control" required>
                                        </div>

                                        <!--  @if ($errors->has('durasi')) -->
                                            <span class="help-block">
                                                <strong>durasi</strong>
                                            </span>
                                      <!--   @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('paket') ? 'has-error': ''}}">
                                    <label for="paket" class="col-md-4 control-label">Paket</label>
                                        <div class="col-md-6">
                                            <input type="text" name="paket" id="paket" class="form-control" required>
                                        </div>

                                        <!--  @if ($errors->has('paket')) -->
                                            <span class="help-block">
                                                <strong>paket</strong>
                                            </span>
                                       <!--  @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('orang') ? 'has-error': ''}}">
                                    <label for="orang" class="col-md-4 control-label">Orang</label>
                                        <div class="col-md-6">
                                            <input type="text" name="orang" id="orang" class="form-control" required>
                                        </div>

                                         <!-- @if ($errors->has('orang')) -->
                                            <span class="help-block">
                                                <strong>orang</strong>
                                            </span>
                                       <!--  @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('tgl_mulai') ? 'has-error': ''}}">
                                    <label for="tgl_mulai" class="col-md-4 control-label">Tanggal Mulai</label>
                                        <div class="col-md-6">
                                            <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required>
                                        </div>

                                         <!-- @if ($errors->has('tgl_mulai')) -->
                                            <span class="help-block">
                                                <strong>mulai</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('tgl_selesai') ? 'has-error': ''}}">
                                    <label for="tgl_selesai" class="col-md-4 control-label">Tanggal Selesai</label>
                                        <div class="col-md-6">
                                            <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('tgl_selesai')) -->
                                            <span class="help-block">
                                                <strong>selesai</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Cover Laporan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="cover" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>cover laporan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Pengantar/ Pendahuluan&isi</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="Pengantar" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Pengantar/ Pendahuluan&isi</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Surat Keputusan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="Surat" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Surat Keputusan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Nominatif Peserta Pelatihan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Nominatif Peserta Pelatihan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Nominatif Instruktur</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Nominatif Instruktur</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Kurikulum</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="Kurikulum" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Kurikulum</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Jadwal Pelatihan Mingguan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Jadwal Pelatihan Mingguan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Daftar Hadir Instruktur</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Daftar Hadir Instruktur</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Daftar Jam Mengajar Instruktur</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Daftar Jam Mengajar Instruktur</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Daftar Hadir Peserta Pelatihan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Daftar Hadir Peserta Pelatihan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Daftar Permintaan Bahan Latihan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Daftar Permintaan Bahan Latihan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Bukti Penerimaan Bahan Latihan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Bukti Penerimaan Bahan Latihan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Laporan Mingguan Pengguna Bahan Latihan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Laporan Mingguan Pengguna Bahan Latihan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Undangan Sidang Kelulusan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Undangan Sidang Kelulusan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Berita Acara Sidang Kelulusan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Berita Acara Sidang Kelulusan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Daftar Hadir Pertemuan Sidang Kelulusan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Daftar Hadir Pertemuan Sidang Kelulusan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Daftar Nilai Akhir</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Daftar Nilai Akhir</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Rekap Penilaian Pelatihan Berbasis Kompetensi</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Rekap Penilaian Pelatihan Berbasis Kompetensi</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Rekapitulasi Akhir Hasil Pelatihan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Rekapitulasi Akhir Hasil Pelatihan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Tanda Terima Transport Peserta</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Tanda Terima Transport Peserta</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Tanda Terima Kartu Asuransi Peserta</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Tanda Terima Kartu Asuransi Peserta</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Tanda Terima Pakaian Kerja Peserta</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Tanda Terima Pakaian Kerja Peserta</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Tanda Terima ATK Peserta</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Tanda Terima ATK Peserta</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Tanda Terima Modul</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Tanda Terima Modul</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Tanda Terima Konsumsi Peserta</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Tanda Terima Konsumsi Peserta</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Foto Dokumentasi Kegiatan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Foto Dokumentasi Kegiatan</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Fotocopy Sertifikat Peserta</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>
<!-- 
                                         @if ($errors->has('kejuruan')) -->
                                            <span class="help-block">
                                                <strong>Fotocopy Sertifikat Peserta</strong>
                                            </span>
                                        <!-- @endif -->
                                </div>  
                    	<div class="form-group">
                    		<div class="col-md-8 col-md-offset-4">
                    			<button class="btn btn-success">Simpan</button>
                    		</div>
                    	</div>
                   		
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
