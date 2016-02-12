<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function editprofile_user()
    {
        return view('user.edit_profile');   
    }

    public function editprofile_admin()
    {
    	return view('admin.edit_profile');	
    }
}
