<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('identity_no', 12);
            $table->string('password');
            $table->rememberToken();
            $table->string('current_pbt')->nullable();
            $table->string('office_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->timestamp('last_password_change')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
