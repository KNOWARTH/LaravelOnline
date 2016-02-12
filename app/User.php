<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected function validateUpdateData($post){
        $rules =array('name' => 'required',
                    'email' => 'required|email|unique:users,email,'.$post['id'],
                    'password' =>'required|min:6',
                );
        $validator = Validator::make($post,$rules);
        return $validator;
    }
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
