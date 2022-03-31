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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('tagline');
            $table->string('imageURL');
            $table->string('duration');
            $table->string('mingroup');
            $table->string('destination');
            $table->longtext('description');
            $table->string('contact_person');
            $table->string('phone');
            $table->string('address');
            $table->string('price');
            $table->enum('is_sale', ['0','1']);
            $table->string('sale_price');
            $table->string('discount');
            $table->enum('status', ['1','0']);
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
        Schema::dropIfExists('packages');
    }
};
