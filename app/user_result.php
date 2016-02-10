<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_result extends Model
{
    protected $fillable = [
        'exam_id', 'exam_date', 'marks','result_status','exam_status',
    ];
}
