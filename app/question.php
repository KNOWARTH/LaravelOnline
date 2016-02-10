<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
  protected $table = 'question';
	protected function validateData($post){
    	$rules =array('question' => 'required|unique:question',
                      'opt_a' =>'required',
                      'opt_b' =>'required',
                      'opt_c' =>'required',
                      'opt_d' =>'required',
                      'opt_d' =>'required',
                      'correct_ans' =>'required|numeric',
                      'exam_id' =>'required|numeric',
                );
        $validator = Validator::make($post,$rules);
        return $validator;
    }

     protected $fillable = [
        'question', 'opt_a', 'opt_b','opt_c','opt_d','opt_e','correct_ans','exam_id',
    ];
}
