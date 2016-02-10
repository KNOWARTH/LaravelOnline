<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\User;
use Session;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function editprofile_admin()
    {
    	return view('admin.edit_profile');	
    }

    public function create()
    {
        return view('admin.admin_registration');
    }

    public function store(Request $request)
    {
        $rules =array('name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' =>'required||confirmed|min:6',
                );
    	$post = $request->all();
    	$validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        else{
            unset($post['_token'],$post['password_confirmation']);
            $user = new user;
            foreach ($post as $key => $value){
                $user->$key = $value;
            }
            $result = $user->save();
            //$result = exam::insert($post);
            if($result>0){
                Session::flash('message','Exam successfully inserted');       
            }
            return redirect('admin');
        }
    }
}
