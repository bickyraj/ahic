<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_category_id');
            $table->string('name');
            $table->longText('description');
            $table->string('background_image')->nullable();
            $table->string('video_link');
            $table->string('duration');
            $table->string('study_method');
            $table->string('onshore_fee');
            $table->string('offshore_fee');
            $table->integer('order_by');
            $table->integer('status');
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
        Schema::dropIfExists('courses');
    }
}
