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
            $table->string('middlename')->nullable();
            $table->date('dob');
            $table->string('gender');
            $table->string('country');
            $table->string('usi_number');
            $table->enum('in_australia',['0','1']);
            $table->string('visa_category');
            $table->date('visa_expired_date');
            $table->string('visa_office_applying_for');
            $table->enum('islander_origin',['0','1','2','3']);
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
