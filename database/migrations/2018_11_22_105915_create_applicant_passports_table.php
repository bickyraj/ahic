<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantPassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_passports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_form_id');
            $table->string('nationality');
            $table->string('number');
            $table->date('issued_date');
            $table->date('expired_date');
            $table->string('place_of_issue');
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
        Schema::dropIfExists('applicant_passports');
    }
}
