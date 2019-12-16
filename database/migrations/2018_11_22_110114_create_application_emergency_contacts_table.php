<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_emergency_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_form_id');
            $table->string('name');
            $table->string('relationship');
            $table->string('address');
            $table->string('telephone');
            $table->string('mobile');
            $table->string('email');
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
        Schema::dropIfExists('application_emergency_contacts');
    }
}
