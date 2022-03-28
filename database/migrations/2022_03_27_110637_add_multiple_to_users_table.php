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
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('dob');
            $table->string('address');
            $table->string('phonenum');
            $table->enum('status', ['Y','N']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('dob');
            $table->string('address');
            $table->string('phonenum');
            $table->enum('status', ['Y','N']);
        });
    }
};
