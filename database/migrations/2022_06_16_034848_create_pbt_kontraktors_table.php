<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePbtKontraktorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbt_kontraktors', function (Blueprint $table) {
            $table->string('kod_pbt');
            $table->foreign('kod_pbt')->references('kod')->on('pbts');
            $table->foreignId('kontraktor_id')->constrained('kontraktors');
            $table->string('no_kontrak');
            $table->string('status_perkhidmatan');
            $table->date('tarikh_mula');
            $table->date('tarikh_tamat')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbt_kontraktors');
    }
}
