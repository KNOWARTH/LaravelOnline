<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function exam()
    {
        return view('user.available_exam');
    }

    public function manageexam()
    {
    	return view('admin.manage_exam');
    }

    public function createexam()
    {
    	return view('admin.create_exam');	
    }
}
