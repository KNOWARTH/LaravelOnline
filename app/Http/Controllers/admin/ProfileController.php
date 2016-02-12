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
    //Check Authentication.
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Display Admin Registration page with list of Admin.
    public function index()
    {
        $result = user::where('status',1)->sorted()->paginate(5);
        $table = \Table::create($result, ['name','email']);
        return view('admin.admin_registration')->with('result',$table);
    }

    //Show the EditProfile form for editing the specified resource.
    public function edit()
    {
        $id = \Auth::id(); 
        $currentuser = User::find($id); 
        return view('admin.edit_profile')->with('result',$currentuser);
    }

    // Store a newly created Admin resource in storage.
    public function store(Request $request)
    {
        $post = $request->all();
        $validator=user::validateData($post);
        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }else{
            unset($post['_token'],$post['password_confirmation']);
            $user = new user;
            foreach ($post as $key => $value){
                $user->$key = $value;
            }
            $result = $user->save();
            if($result>0){
                Flash::success('Profile successfully inserted');      
            }
            return redirect('admin');
        }
    }

    //Update the Admin Profile in storage.
    public function update(Request $request)
    {
        $post = $request->all();
        $validator=user::validateUpdateData($post);
        if ($validator->fails()){
             return redirect()->back()->withErrors($validator->errors());
        }else{
            $currentpassword = \Auth::user()->password;
            if (\Hash::check($post['password'], $currentpassword)) {
                unset($post['_token'],$post['password']);
                $result = user::where('id',$post['id'])->update($post);
                if($result>0){
                    Flash::success('Profile successfully updated');    
                }
                return redirect('admin');
            }else{
                return redirect()->back()->withErrors('Wrong Password');
            }
            
        }
    }

}
