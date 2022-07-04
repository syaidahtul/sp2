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
            $table->string('tempat');
            $table->string('kaedah_pelupusan');
            $table->string('city')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
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
        Schema::dropIfExists('tapak_pelupusan_sampahs');
    }
}
