<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationCurrentEnglishLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_current_english_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_form_id');
            $table->string('english_first_lang');
            $table->integer('english_lang_test');
            $table->string('score_achieved');
            $table->integer('year_taken');
            $table->integer('listening');
            $table->integer('reading');
            $table->integer('writing');
            $table->integer('speaking');
            $table->integer('total_score');
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
        Schema::dropIfExists('application_current_english_levels');
    }
}
