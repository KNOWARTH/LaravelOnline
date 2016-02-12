<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_ans_log extends Model
{

	 protected $table = 'user_ans_log';

	//set fillable fields in table.
    protected $fillable = [
        'user_id', 'exam_id', '	que_id','answer','user_answer','start_time','end_time','exam_date',
    ];
}
