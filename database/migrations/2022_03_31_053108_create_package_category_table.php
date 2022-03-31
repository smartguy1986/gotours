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
        Schema::create('package_category', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name');
            $table->string('cat_image');
            $table->string('cat_tagline');
            $table->longtext('cat_description');
            $table->enum('status', ['1', '0']);
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
        Schema::dropIfExists('package_category');
    }
};
