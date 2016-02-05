<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_result', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id')->unsigned();
            $table->date('exam_date');
            $table->integer('marks');
            $table->boolean('result_status');
            $table->boolean('exam_status');
            $table->timestamps();
            
        });

       Schema::table('user_result', function($table) {
            $table->foreign('exam_id')->references('id')->on('create_exam')->onDelete('cascade')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_result');
    }
}
