<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationDateOfIntakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_date_of_intakes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->string('date');
            $table->string('term');
            $table->string('mid_term');
            $table->string('end_date');
            $table->string('duration');
            $table->string('holiday_start');
            $table->string('holiday_end');
            $table->string('holiday_duration');
            $table->string('credential_release');
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
        Schema::dropIfExists('application_date_of_intakes');
    }
}
