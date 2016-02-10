<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\exam;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
class ExamController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = exam::paginate(5);
        return view('')->with('result',$result);
    }

    public function create()
    {
        return view('admin.create_exam');
    }

    public function manageexam()
    {
        $result = exam::get();
        return view('admin.manage_exam')->with('result',$result);
    }
    public function store(Request $request)
    {
        $post = $request->all();
        $validator=exam::validateData($post);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            unset($post['_token']);
            $exam = new exam;
            foreach ($post as $key => $value){
                $exam->$key = $value;
            }
            $result = $exam->save();
            //$result = exam::insert($post);
            if($result>0){
                Session::flash('message','Exam successfully inserted');       
            }
            return redirect('admin');
        }
    }

    public function updateStatus(Request $request)
    {
        $post = $request->all();
        $result = exam::count(); 
        unset($post['_token']);
        
          for($i=1;$i<=$result;$i++){
            exam::where('id', $i)->update(['exam_status' => $post[$i]]);
        }
            if($result>0){
                Session::flash('message','ExamStatus successfully updated');       
            }
            return redirect()->back();
    }

    public function show($id)
    {
        $result = exam::where('id',$id)->first();
        return view('')->with('result',$result);
    }

    public function edit($id)
    {
        $result = exam::where('id',$id)->first();
        return view('')->with('result',$result);
    }

    public function update(Request $request)
    {
        $post = $request->all();
        $validator=exam::validateData($post);
        if($validator->fails()){
            return redirect()->back()->withErrors($v->errors());
        }
        else{
            unset($post['_token']);
            $result = exam::where('id',$post['id'])->update($post);
            if($result>0){
                Session::flash('message','Exam successfully updated');
                return true;        
            }
        }
                
    }

    public function destroy($id)
    {
        $result =detail::destroy($id);
        if($result>0){
                Session::flash('message','Exam successfully deleted');
                return true;
        }
    }

    
}
