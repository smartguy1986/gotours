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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('agency_id');
            $table->string('manager_id');
            $table->string('agency_name');
            $table->string('agency_logo');
            $table->string('agency_banner');
            $table->longText('agency_bio');
            $table->longText('agency_description');
            $table->string('agency_email');
            $table->string('agency_phone');
            $table->string('agency_address');
            $table->string('agency_contact');
            $table->string('agency_gstnumber');
            $table->enum('status', [0, 1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencies');
    }
};
