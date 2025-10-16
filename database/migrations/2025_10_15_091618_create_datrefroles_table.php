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
        Schema::create('datrefroles', function (Blueprint $table) {
            $table->id();
            $table->string("nama_role");
            $table->string("role_code");
            $table->string("createdby");
            $table->string("modby");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datrefroles');
    }
};
