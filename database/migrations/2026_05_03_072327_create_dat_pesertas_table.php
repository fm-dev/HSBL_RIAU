<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dat_pesertas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_sekolah');
            $table->bigInteger('id_events');
            $table->string('namaLengkap');
            $table->bigInteger('id_posisi');
            $table->integer('NIK');
            $table->integer('nomor_jersey');
            $table->date('tgl_lahir');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->boolean('status');
            $table->string('nomor_handphone');
            $table->string('alamat');
            $table->string('email');
            $table->string('path_kk');
            $table->string('path_akte');
            $table->string('path_ijazah');
            $table->string('path_biodata_lapor');
            $table->string('path_surat_keterangan_ortu');
            $table->string('path_photo');
            $table->string('created_by');
            $table->string('create_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_pesertas');
    }
};
