<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationEducationalQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_educational_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_form_id');
            $table->string('qualification');
            $table->string('educational_institution');
            $table->integer('start_year');
            $table->string('start_month');
            $table->integer('completed_year');
            $table->string('completed_month');
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
        Schema::dropIfExists('application_educational_qualifications');
    }
}
