<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenteras', function (Blueprint $table) {
            $table->string('kod_pbt');
            $table->string('kod_jenis_jentera');
            $table->string('no_pendaftaran', 250);
            $table->string('status', 20);
            $table->text('catatan')->nullable();
            $table->entityHistory();
            $table->foreign('kod_pbt')->references('kod')->on('pbts');
            $table->foreign('kod_jenis_jentera')->references('kod')->on('jenis_jenteras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenteras');
    }
}
