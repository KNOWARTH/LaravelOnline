<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\exam;
use Session;
use App\question;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = question::paginate(5);
        return view('')->with('result',$result);
    }

    public function create()
    {
    	 $result = exam::get();
        return view('admin.add_question')->with('result',$result); 
    }

    public function createQuestion($id)
    {
    	$result = exam::where('id',$id)->first();
    	return view('admin.add_question_exam')->with('result',$result); 
    }

    public function store(Request $request)
    {
        $post = $request->all();
        
        $validator=question::validateData($post);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            unset($post['_token']);
            $question = new question;
            foreach ($post as $key => $value){
                $question->$key = $value;
            }
            $result = $question->save();
            //$result = question::insert($post);
            if($result>0){
                Session::flash('message','Question successfully inserted');       
            }
            return redirect()->back()->with('exam_id',$post['exam_id']);
            
        }
    }

    public function show($id)
    {
        $result = question::where('id',$id)->first();
        return view('')->with('result',$result);
    }

    public function edit($id)
    {
        $result = question::where('id',$id)->first();
        return view('')->with('result',$result);
    }

    public function update(Request $request)
    {
        $post = $request->all();
        $validator=question::validateData($post);
        if($validator->fails()){
            return redirect()->back()->withErrors($v->errors());
        }
        else{
            unset($post['_token']);
            $result = question::where('id',$post['id'])->update($post);
            if($result>0){
                Session::flash('message','Question successfully updated');
                return true;        
            }
        }
    }

    public function destroy($id)
    {
        $result =question::destroy($id);
        if($result>0){
                Session::flash('message','Question successfully deleted');
                return true;
            }
    }
}
