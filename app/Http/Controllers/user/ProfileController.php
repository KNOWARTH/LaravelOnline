<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\user;
use Session;
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
        $id = \Auth::id(); 
        $currentuser = user::find($id); 
        return view('user.edit_profile')->with('result',$currentuser);
    }

    public function updateprofile(Request $request)
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
                    Session::flash('message','profile successfully updated');       
                }
                return redirect('/');
            }else{
                return redirect()->back()->withErrors('Wrong Password');
            }
            
        }
    }

}
