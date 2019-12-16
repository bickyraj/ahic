<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationCheckListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_check_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_form_id');
            $table->integer('completed_all_form');
            $table->integer('enclosed_certified_passport_and_visa');
            $table->integer('enclosed_qualification');
            $table->integer('enclosed_english_lang_proficiency');
            $table->integer('enclosed_certified_documents');
            $table->integer('read_ticked_declaration');
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
        Schema::dropIfExists('application_check_lists');
    }
}
