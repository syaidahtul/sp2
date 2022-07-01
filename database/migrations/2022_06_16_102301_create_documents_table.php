<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
   
    
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documentable_id');
            $table->string('documentable_type');
            $table->string('document_name');
            $table->string('document_path');
            $table->string('document_remark');
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }

}
