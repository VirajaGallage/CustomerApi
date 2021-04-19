<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('property_category');
            $table->string('location');
            $table->string('district');
            $table->string('city');
            $table->string('address_of_property');
            $table->string('price');
            $table->string('details');
            // $table->string('images');
            $table->string('contact_no');
            $table->string('rooms');
            $table->string('washrooms');
            $table->string('email');
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
        Schema::dropIfExists('ads');
    }
}
