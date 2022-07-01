<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTapakPelupusanSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tapak_pelupusan_sampahs', function (Blueprint $table) {
            $table->id();
            $table->string('kod_pbt');
            $table->string('nama');
            $table->string('jenis_kawasan');
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
        Schema::dropIfExists('tapak_pelupusan_sampahs');
    }
}
