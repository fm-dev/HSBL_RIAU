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
        Schema::create('dat_menu_children', function (Blueprint $table) {
            $table->id();
            $table->string('labelMenu',255);
            $table->integer('parentId');
            $table->string('path', 255);
            $table->integer('roleId');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_menu_children');
    }
};
