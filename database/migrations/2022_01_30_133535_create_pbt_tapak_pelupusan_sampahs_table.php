<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePbtTapakPelupusanSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbt_tapak_pelupusan_sampahs', function (Blueprint $table) {
            $table->string('kod_pbt');
            $table->foreign('kod_pbt')->references('kod')->on('pbts');
            $table->foreignId('tapak_pelupusan_sampah_id')->constrained('tapak_pelupusan_sampahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbt_tapak_pelupusan_sampahs');
    }
}
