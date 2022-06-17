<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPbtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pbts', function (Blueprint $table) {
            $table->uuid('user_id')->references('id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('kod_pbt');
            $table->foreign('kod_pbt')->references('kod')->on('pbts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_pbts');
    }
}
