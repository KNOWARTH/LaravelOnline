<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use Gbrock\Table\Traits\Sortable;
use Validator;
class exam extends Model
{   
    //set table name.
    protected $table = 'exam';

    //set searchable columns in table.
    use SearchableTrait;
    protected $searchable = [
        'columns' => ['exam_name',],
    ];

    //set Sortable columns in table.
    use Sortable;
    protected $sortable = ['id','exam_name', 'total_question','duration_per_que','mark_per_que','passing_marks','exam_status'];

    //set fillable fields in table.
    protected $fillable = [
        'exam_name', 'description', 'total_question','duration_per_que','mark_per_que','passing_marks','exam_status',
    ];

    //set Validationa Rules For Storing Data
    protected function validateData($post)
    {
    	$rules =array('exam_name' => 'required|Min:3|Max:80|unique:exam',
                    'description' => 'required|Min:15|Max:500',
                    'total_question' =>'required|numeric',
                    'duration_per_que' =>'required|numeric',
                    'passing_marks' =>'required|numeric',
                );
        $validator = Validator::make($post,$rules);
        return $validator;
    }
    //set Validationa Rules For Updating Data
    protected function validateUpdateData($post)
    {
        $rules =array('exam_name' => 'required|Min:3|Max:80',
                    'description' => 'required|Min:15|Max:500',
                    'total_question' =>'required|numeric',
                    'duration_per_que' =>'required|numeric',
                    'passing_marks' =>'required|numeric',
                );
        $validator = Validator::make($post,$rules);
        return $validator;
    }

}
