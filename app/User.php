<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Gbrock\Table\Traits\Sortable;
use Kodeine\Acl\Traits\HasRole;
use Validator;
class User extends Authenticatable 
{   
    //set Sortable columns in table.
    use Sortable;
    protected $sortable = ['name','email'];

    //set Validationa Rules For Storing Data
    protected function validateData($post){
        $rules =array('name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' =>'required||confirmed|min:6',
                );
        $validator = Validator::make($post,$rules);
        return $validator;
    }

    //set Validationa Rules For Updating Data
    protected function validateUpdateData($post){
        $rules =array('name' => 'required',
                    'email' => 'required|email|unique:users,email,'.$post['id'],
                    'password' =>'required|min:6',
                );
        $validator = Validator::make($post,$rules);
        return $validator;
    }

    //set fillable fields in table.
    protected $fillable = [
        'name', 'email', 'password',
    ];

    //set Hidden fields in table.
    protected $hidden = [
        'password', 'remember_token',
    ];
}
