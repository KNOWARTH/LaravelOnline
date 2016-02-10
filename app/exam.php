<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
class exam extends Model
{   
    protected $table = 'exam';
     protected $fillable = [
        'exam_name', 'description', 'total_question','duration_per_que','mark_per_que','passing_marks','exam_status',
    ];

    protected function validateData($post){
    	$rules =array('exam_name' => 'required|Min:3|Max:80|unique:exam',
                    'description' => 'required|Min:15|Max:500',
                    'total_question' =>'required|numeric',
                    'duration_per_que' =>'required|numeric',
                    'passing_marks' =>'required|numeric',
                );
        $validator = Validator::make($post,$rules);
        return $validator;
    }

}
