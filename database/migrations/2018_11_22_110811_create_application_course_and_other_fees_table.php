<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationCourseAndOtherFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_course_and_other_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_form_id');
            $table->string('application_fee');
            $table->string('tution_fee');
            $table->string('overseas_student_health_cover');
            $table->string('airport_pickup_fee');
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
        Schema::dropIfExists('application_course_and_other_fees');
    }
}
