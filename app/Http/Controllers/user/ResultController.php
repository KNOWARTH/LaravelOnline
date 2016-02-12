<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function viewresult()
    {
    	echo "hello"; exit;
    	$user_id=\Auth::id();
    	
        return view('user.view_result');      
    }
}
