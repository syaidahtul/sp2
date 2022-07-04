<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosPelupusanSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos_pelupusan_sampahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tapak_pelupusan_sampah_id')->constrained('tapak_pelupusan_sampahs');
            $table->date('tarikh_kos');
            $table->decimal('amount', 9, 5);
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
        Schema::dropIfExists('kos_pelupusan_sampahs');
    }
}
