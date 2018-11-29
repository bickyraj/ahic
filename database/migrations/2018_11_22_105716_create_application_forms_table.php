<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('date_of_intake_id');
            $table->string('firstname');
            $table->string('familyname');
            $table->string('middlename')->nullable();
            $table->date('dob');
            $table->string('gender');
            $table->string('birth_city');
            $table->string('birth_country');
            $table->string('usi_number');
            $table->integer('in_australia');
            $table->string('visa_category');
            $table->date('visa_expired_date');
            $table->string('visa_office_applying_for');
            $table->integer('islander_origin');
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
        Schema::dropIfExists('application_forms');
    }
}
