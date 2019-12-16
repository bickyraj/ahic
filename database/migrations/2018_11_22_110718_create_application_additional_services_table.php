<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationAdditionalServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_additional_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_form_id');
            $table->integer('airport_pickup');
            $table->integer('assistance_with_accomodation');
            $table->string('if_acco')->nullable();
            $table->date('accomodation_start_date');
            $table->integer('disability');
            $table->string('if_disability')->nullable();
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
        Schema::dropIfExists('application_additional_services');
    }
}
