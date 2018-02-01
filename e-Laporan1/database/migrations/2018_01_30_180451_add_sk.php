<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laporans', function($table) {
            $table->string('surat_keputusan');
            $table->string('status_surat_keputusan');
            $table->text('catatan_surat_keputusan');
            $table->string('nominatif_peserta_pelatihan');
            $table->string('status_nominatif_peserta_pelatihan');
            $table->text('catatan_nominatif_peserta_pelatihan');
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
