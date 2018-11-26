<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationAddressInHomeCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_address_in_home_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_form_id');
            $table->string('street');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('telephone');
            $table->string('email');
            $table->string('postcode');
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
        Schema::dropIfExists('application_address_in_home_countries');
    }
}
