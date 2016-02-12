<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Gbrock\Table\Traits\Sortable;
class question extends Model
{
    //set table name.
    protected $table = 'question';

    //set searchable columns in table.
    use SearchableTrait;
    protected $searchable = [
        'columns' => ['question',],
    ];

    //set Sortable columns in table.    
    use Sortable;
    protected $sortable = ['id','question', 'opt_a', 'opt_b','opt_c','opt_d','opt_e','correct_ans','exam_id'];

    //set Validationa Rules For Storing Data
    protected function validateData($post)
    {
        $rules =array('question' => 'required|unique:question',
                      'opt_a' =>'required',
                      'opt_b' =>'required',
                      'opt_c' =>'required',
                      'opt_d' =>'required',
                      'opt_e' =>'required',
                      'correct_ans' =>'required|numeric',
                      'exam_id' =>'required|numeric',
                    );
        $validator = Validator::make($post,$rules);
        return $validator;
    }
    
    //set Validationa Rules For Updating Data
    protected function validateUpdateData($post)
    {
        $rules =array('question' => 'required|unique:question,question,'.$post['id'],
                      'opt_a' =>'required',
                      'opt_b' =>'required',
                      'opt_c' =>'required',
                      'opt_d' =>'required',
                      'opt_e' =>'required',
                      'correct_ans' =>'required|numeric',
                  );
        $validator = Validator::make($post,$rules);
        return $validator;
    }

    //set fillable fields in table.
    protected $fillable = [
        'question', 'opt_a', 'opt_b','opt_c','opt_d','opt_e','correct_ans','exam_id',
    ];
}
