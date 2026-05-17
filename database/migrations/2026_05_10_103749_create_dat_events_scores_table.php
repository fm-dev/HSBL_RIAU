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
        Schema::create('dat_events_scores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kompetisi_id');
            $table->bigInteger('firstTeam_id');
            $table->bigInteger('secondTeam_id');
            $table->dateTime('datebegin');
            $table->time('time_begin');
            $table->integer('score_first_teeam')->nullable();
            $table->integer('score_second_teeam')->nullable();
            $table->boolean('isFinal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_events_scores');
    }
};
