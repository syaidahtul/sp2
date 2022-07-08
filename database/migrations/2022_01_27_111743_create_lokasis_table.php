<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lokasi');
            $table->string('kod_pbt');
            $table->string('kod_jenis_operasi');
            $table->string('kod_jenis_kawasan')->nullable();
            $table->integer('bilangan_lot')->nullable();
            $table->string('catatan')->nullable();
            $table->entityHistory();
            $table->foreign('kod_pbt')->references('kod')->on('pbts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasis');
    }
}
