<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationIfStudentUnderAgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_if_student_under_ages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_form_id');
            $table->string('parent_name');
            $table->integer('contact_detail');
            $table->date('date');
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
        Schema::dropIfExists('application_if_student_under_ages');
    }
}
