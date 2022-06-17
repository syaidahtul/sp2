<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontraktorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontraktors', function (Blueprint $table) {
            $table->id();
            $table->string('kod_pbt');
            $table->string('nama', 250);
            $table->date('tarikh_mula');
            $table->date('tarikh_tamat');
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('kontraktors');
    }
}
