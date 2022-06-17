<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePbtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbts', function (Blueprint $table) {
            $table->string('kod')->primary();
            $table->string('nama_pbt');
            $table->string('no_tel')->nullable();
            $table->string('no_fax')->nullable();
            $table->string('alamat_line1')->nullable();
            $table->string('poskod')->nullable();
            $table->string('state')->default('SABAH');
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbts');
    }
}
