<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
  
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('status')->default('1');
            $table->integer('order_by')->nullable();
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
