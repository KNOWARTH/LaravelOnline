<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_question', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('question');
            $table->longText('opt_a');
            $table->longText('opt_b');
            $table->longText('opt_c');
            $table->longText('opt_d');
            $table->longText('opt_e');
            $table->integer('correct_ans');
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
        Schema::drop('create_question');
    }
}
