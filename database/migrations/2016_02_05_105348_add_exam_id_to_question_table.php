<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExamIdToQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question', function (Blueprint $table) {
            $table->integer('exam_id')->unsigned()->after('correct_ans');
        });
        
        Schema::table('question', function($table) {
            $table->foreign('exam_id')->references('id')->on('exam')->onDelete('cascade')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question', function (Blueprint $table) {
            //
        });
    }
}
