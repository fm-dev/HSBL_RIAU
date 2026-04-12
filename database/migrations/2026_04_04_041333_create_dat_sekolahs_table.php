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
        Schema::create('dat_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('namaSekolah');
            $table->string('logo');
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
        Schema::dropIfExists('dat_sekolahs');
    }
};
