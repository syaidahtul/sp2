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
            $table->string('nama', 250);
            $table->string('no_lesen', 150)->nullable();
            $table->string('jenis_perkhidmatan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('poskod')->nullable();
            $table->string('region')->nullable();
            $table->string('state')->default('SABAH');
            $table->string('no_tel_office')->nullable();
            $table->string('no_fax_office')->nullable();
            $table->string('contact_person_nama')->nullable();
            $table->string('contact_person_no_tel')->nullable();
            $table->string('status')->default('aktif');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kontraktors');
    }
}
