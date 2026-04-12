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
        Schema::create('dat_kompetisi_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idSekolah');
            $table->string('namaTeam');
            $table->unsignedBigInteger('idKompetisi');
            $table->unsignedBigInteger('idSeries');
            $table->string('leader');
            $table->string('kunciData');
            $table->string('verifData');
            $table->unsignedBigInteger('createdby');
            $table->unsignedBigInteger('modby')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_kompetisi_events');
    }
};
