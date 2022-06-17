<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperasiPbtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operasi_pbts', function (Blueprint $table) {
            $table->id();
            $table->string('kod_pbt');
            $table->foreignId('lokasi_id');
            $table->string('jenis_operasi');
            $table->date('tarikh_operasi_mula')->nullable();
            $table->date('tarikh_operasi_tamat')->nullable();
            $table->string('status_operasi')->nullable();
            $table->date('tarikh_laporan')->nullable();
            $table->string('status_laporan')->nullable();
            $table->decimal('peratus_kemajuan', 6, 2)->default(0.00);
            $table->text('catatan')->nullable();
            $table->entityHistory();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operasi_pbts');
    }
}
