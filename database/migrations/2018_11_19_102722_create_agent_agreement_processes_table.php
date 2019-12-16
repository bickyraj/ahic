<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentAgreementProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_agreement_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id');
            $table->integer('agent_document_id');
            $table->date('sent_date');
            $table->string('agreement')->nullable();
            $table->date('received_date')->nullable();
            $table->string('signed');
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
        Schema::dropIfExists('agent_agreement_processes');
    }
}
