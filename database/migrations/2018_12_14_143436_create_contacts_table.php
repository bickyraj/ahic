<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
  {
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('ABN')->nullable();
            $table->string('RTO')->nullable();
            $table->string('CRICOS')->nullable();
            $table->string('street_name');
            $table->string('call_time');
            $table->string('fb')->nullable();
            $table->string('in')->nullable();
            $table->string('tw')->nullable();
            $table->string('yt')->nullable();
            $table->string('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
