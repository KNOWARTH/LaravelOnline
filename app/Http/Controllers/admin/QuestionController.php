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
    //Check Authentication.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Display manage Questions page with resource.
    public function index($id)
    {
        $result = question::where('exam_id',$id)->paginate(5);
        foreach($result as $result1){
            if($result1['correct_ans']==1){$result1['correct_ans']='A';}
            if($result1['correct_ans']==2){$result1['correct_ans']='B';}
            if($result1['correct_ans']==3){$result1['correct_ans']='C';}
            if($result1['correct_ans']==4){$result1['correct_ans']='D';}
            if($result1['correct_ans']==5){$result1['correct_ans']='E';}
        } 
        $table = \Table::create($result, ['question','correct_ans']);
        return view('admin.manage_questions')->with('result',$table)->with('exam_id',$id);
    }

    //Show the Create form for creating a Question In new Exam resource.
    public function create($id)
    {
    	$result = exam::where('id',$id)->first();
        $result1 = question::where('exam_id',$id)->count();
        return view('admin.add_question_exam')->with('result',$result)->with('result1',$result1);
    }

    // Store a newly created Question resource in storage.
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
            if($result>0){
                Flash::success('Question successfully inserted');    
            }
            return redirect()->back()->with('exam_id',$post['exam_id']);
            
        }
    }

    //Display ExamQuestions with Search Result.
    public function search(Request $request)
    { 
        $post = $request->all();
        $que = $post['search'];;
        $exam_id =$post['exam_id'];
        $result = question::where('question', 'LIKE', '%' . $que . '%')->where('exam_id',$exam_id)->paginate(5);
        $table = \Table::create($result, ['question','correct_ans']);
        return view('admin.manage_questions')->with('searchResult',$table)->with('exam_id',$exam_id);
     }

    //Show the EditQuestion form for editing the specified resource.
    public function edit($id)
    {
        $result = question::where('id',$id)->first();
        return view('admin.edit_question')->with('result',$result);
    }

    //Update the Questions resource in storage.
    public function update(Request $request)
    {
        $post = $request->all();
        $exam_id=$post['exam_id']; unset($post['exam_id']);
        $validator=question::validateUpdateData($post);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            unset($post['_token']);
            $result = question::where('id',$post['id'])->update($post);
            if($result>0){
                Flash::success('Question successfully updated'); 
                return redirect('manageQuestions/'.$exam_id);      
            }
        }
        
        
    }

    //destroy the Question resource in storage.
    public function destroy($id)
    {
        $result =question::destroy($id);
        if($result>0){
                Flash::success('Question successfully deleted');
                return redirect()->back();
            }
    }

}
