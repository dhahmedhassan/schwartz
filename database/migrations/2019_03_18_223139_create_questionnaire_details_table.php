<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('user_id')->nullable();
            $table->integer('questionnaire_id')->nullable();
            $table->integer('question_id')->nullable();
            $table->text('body')->nullable();
            $table->timestamps();

            // $table->foreign('questionnaire_id')->references('id')->on('questionnaire'); // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaire_details');
    }
}
