<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id');
            $table->string('company_name');
            $table->string('EOI');
            $table->string('ABN');
            $table->string('reference');
            $table->string('qualification');
            $table->string('profile');
            $table->string('address');
            $table->string('country');
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
        Schema::dropIfExists('agent_documents');
    }
}
