<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisapprovedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disapproveds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quizno');
            $table->string('question');
            $table->string('about');
            $table->string('comment');
            $table->integer('under');
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
        Schema::dropIfExists('disapproveds');
    }
}
