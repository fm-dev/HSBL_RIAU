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
        Schema::create('datusers', function (Blueprint $table) {
            $table->id();
            $table->string('username',255);
            $table->string('password');
            $table->string('email')->nullable();
            $table->string("phone")->nullable();
            $table->string("role");
            $table->string("status")->nullable();
            $table->string("alamat")->nullable();
            $table->string("createdby")->nullable();
            $table->string("modby")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datusers');
    }
};
