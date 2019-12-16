<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOreintationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oreintations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('next_orientation')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('college_address')->nullable();
            $table->text('info')->nullable();
            $table->string('link')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('oreintations');
    }
}
