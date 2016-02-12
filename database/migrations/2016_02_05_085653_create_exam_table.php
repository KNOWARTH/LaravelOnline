<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exam_name');
            $table->longText('description');
            $table->integer('total_question');
            $table->integer('duration_per_que');
            $table->integer('mark_per_que');
            $table->integer('passing_marks');
            $table->boolean('exam_status');
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
        Schema::drop('exam');
    }
}
