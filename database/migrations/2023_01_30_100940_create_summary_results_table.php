<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummaryResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userID')->nullable();
            $table->string('fullName')->nullable();
            $table->integer('correctAnswer')->nullable();
            $table->integer('wrongAnswer')->nullable();
            $table->integer('maxedQuestion')->nullable();
            $table->string('remark')->nullable();
            $table->string('quiz_passed')->nullable();
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
        Schema::dropIfExists('summary_results');
    }
}
