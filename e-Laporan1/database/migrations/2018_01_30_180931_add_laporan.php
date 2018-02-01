<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laporans', function($table) {
            $table->string('nominatif_instruktur');
            $table->string('status_nominatif_instruktur');
            $table->text('catatan_nominatif_instruktur');
            $table->string('kurikulum');
            $table->string('status_kurikulum');
            $table->text('catatan_kurikulum');
            $table->string('jadwal_pelatihan_mingguan');
            $table->string('status_jadwal_pelatihan_mingguan');
            $table->text('catatan_jadwal_pelatihan_mingguan');
            $table->string('daftar_hadir_instruktur');
            $table->string('status_daftar_hadir_instruktur');
            $table->text('catatan_daftar_hadir_instruktur');
            $table->string('daftar_jam_mengajar_instruktur');
            $table->string('status_daftar_jam_mengajar_instruktur');
            $table->text('catatan_daftar_jam_mengajar_instruktur');
            $table->string('daftar_hadir_peserta_pelatihan');
            $table->string('status_daftar_hadir_peserta_pelatihan');
            $table->text('catatan_daftar_hadir_peserta_pelatihan');
            $table->string('daftar_permintaan_bahan_pelatihan');
            $table->string('status_daftar_permintaan_bahan_pelatihan');
            $table->text('catatan_daftar_permintaan_bahan_pelatihan');
            $table->string('bukti_penerimaan_bahan_pelatihan');
            $table->string('status_bukti_penerimaan_bahan_pelatihan');
            $table->text('catatan_bukti_penerimaan_bahan_pelatihan');
            $table->string('laporan_mingguan_penggunaan_bahan_pelatihan');
            $table->string('status_laporan_mingguan_penggunaan_bahan_pelatihan');
            $table->text('catatan_laporan_mingguan_penggunaan_bahan_pelatihan');
            $table->string('undangan_sidang_kelulusan');
            $table->string('status_undangan_sidang_kelulusan');
            $table->text('catatan_undangan_sidang_kelulusan');
            $table->string('berita_acara_sidang_kelulusan');
            $table->string('status_berita_acara_sidang_kelulusan');
            $table->text('catatan_berita_acara_sidang_kelulusan');
            $table->string('daftar_hadir_pertemuan_sidang_kelulusan');
            $table->string('status_daftar_hadir_pertemuan_sidang_kelulusan');
            $table->text('catatan_daftar_hadir_pertemuan_sidang_kelulusan');
            $table->string('daftar_nilai_akhir');
            $table->string('status_daftar_nilai_akhir');
            $table->text('catatan_daftar_nilai_akhir');
            $table->string('rekap_penilaian_pelatihan_berbasis_kompetensi');
            $table->string('status_rekap_penilaian_pelatihan_berbasis_kompetensi');
            $table->text('catatan_rekap_penilaian_pelatihan_berbasis_kompetensi');
            $table->string('rekapitulasi_akhir_hasil_pelatihan');
            $table->string('status_rekapitulasi_akhir_hasil_pelatihan');
            $table->text('catatan_rekapitulasi_akhir_hasil_pelatihan');
            $table->string('tanda_terima_transport_peserta');
            $table->string('status_tanda_terima_transport_peserta');
            $table->text('catatan_tanda_terima_transport_peserta');
            $table->string('tanda_terima_asuransi_peserta');
            $table->string('status_tanda_terima_asuransi_peserta');
            $table->text('catatan_tanda_terima_asuransi_peserta');
            $table->string('tanda_terima_pakaian_kerja_peserta');
            $table->string('status_tanda_terima_pakaian_kerja_peserta');
            $table->text('catatan_tanda_terima_pakaian_kerja_peserta');
            $table->string('tanda_terima_atk_peserta');
            $table->string('status_tanda_terima_atk_peserta');
            $table->text('catatan_tanda_terima_atk_peserta');
            $table->string('tanda_terima_modul');
            $table->string('status_tanda_terima_modul');
            $table->text('catatan_tanda_terima_modul');
            $table->string('tanda_terima_konsumsi_peserta');
            $table->string('status_tanda_terima_konsumsi_peserta');
            $table->text('catatan_tanda_terima_konsumsi_peserta');
            $table->string('foto_dokumentasi_kegiatan');
            $table->string('status_foto_dokumentasi_kegiatan');
            $table->text('catatan_foto_dokumentasi_kegiatan');
            $table->string('fotocopy_sertifikasi_peserta');
            $table->string('status_fotocopy_sertifikasi_peserta');
            $table->text('catatan_fotocopy_sertifikasi_peserta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
