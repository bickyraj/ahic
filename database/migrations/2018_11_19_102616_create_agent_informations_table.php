<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pan');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email');
            $table->string('address');
            $table->date('start_date');
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('agent_informations');
    }
}
