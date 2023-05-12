<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question',1024);
            $table->string('answer',1024);
            $table->string('wrong',1024);
            $table->string('quiz_no',1024);
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
        Schema::dropIfExists('add_questions');
    }
}
