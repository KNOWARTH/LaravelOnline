<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\exam;
use App\question;
use App\user_ans_log;
use Illuminate\Pagination\LengthAwarePaginator; //For Pagination

class ExamController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    // This function is used to fetcha and display available exams
    public function exam()
    {
        $result = exam::get();
        return view('user.available_exam',compact('result'));
    }

    public function manageexam()
    {
    	return view('admin.manage_exam');
    }

    public function createexam()
    {
    	return view('admin.create_exam');	
    }

    public function selectexam($id)
    {
        session()->forget('abc');
        session()->forget('current_questionid');

        $result = question::where('exam_id', $id)
               ->orderBy('id')
               ->simplePaginate(1);

        // Count howmany records are available
        $rows=count($result);

        if($rows == "0"){
            return redirect()->back()->withErrors('Questions is not available in selected exam, try after some times ...');
        }else if($rows != "0"){
            // 
            $id = question::where('exam_id', $id)
                   ->orderBy('id')->get();

            foreach ($id as $data) {
                $arr[]= $data->id;
            }
            session(['id' => $arr]);
            // 

            return view('user.displayexam',compact('result'));    
        }
    }

    public function saveanswer(Request $request)
    {
        $input=$request->except('_token');

        if(empty($input['useranswer'])){
            // If user not given particular question answer than set boolean value 0

            $ans_yes_not="0";
            $useranswer="null";
        }else if(!empty($input['useranswer'])){
            // If user not given particular question naswer than set boolean value 1

            $ans_yes_not="1";
            $useranswer=$input['useranswer'];
        }

        // This condition is run when user click on Finish Exam button
        if(isset($_POST['finishexam'])){
            $data = new user_ans_log;
            $data->user_id = \Auth::id();
            $data->exam_id = $request->examid;
            $data->que_id = $request->questionid;
            $data->answer = $ans_yes_not;
            $data->user_answer = $useranswer;
            $data->exam_date = date("Y/m/d");
            $exam_id=$request->examid;
            $user_id=\Auth::id();

            // 
            // This query will find out how many questions answer given by users.
            $data = user_ans_log::where('user_id',$user_id)->where('exam_id',$exam_id)->get();
            foreach ($data as $val) {
                $user_answer[]=$val->user_answer;
            }

            // This query will find out the correct answer set by the examiner
            $data1 = question::where('exam_id',$exam_id)->get();
            $check_question_answer=count($data1);
            foreach ($data1 as $val) {
                $correct_answer[]=$val->correct_ans;
            }

            // This query will findout how many mark specify per question
            $perquestion_mark=exam::where('id',$exam_id)->get();

            // Here check the total number of correct answer given by the user
            for($i=0;$i<$check_question_answer;$i++) {
                if($user_answer[$i] == $correct_answer[$i]) {
                    $count[]=$i;
                }
            }

            $marks=count($count) * $perquestion_mark[0]['mark_per_que']; 
            $passing_mark=$perquestion_mark[0]['passing_marks']; 
            $total_marks=$perquestion_mark[0]['total_question'] * $perquestion_mark[0]['mark_per_que'];     

            $result = exam::where('id', $exam_id)->get();
            return view('user.showresult',compact('result'))->with('examdate',date("d/m/Y"))->with('marks',$marks)->with('passing_mark',$passing_mark)->with('total_marks',$total_marks);
        }

        $data = new user_ans_log;
        $data->user_id = \Auth::id();
        $data->exam_id = $request->examid;
        $data->que_id = $request->questionid;
        $data->answer = $ans_yes_not;
        $data->user_answer = $useranswer;
        $data->exam_date = date("Y/m/d");
        $data->save();

        $total_size=count(session()->get('id'));
        $arr[]=session()->get('id');
        
        if($total_size > 1)
        {
            if($request->session()->has('abc')){
                if(session()->get('abc') < $total_size){
                    $nextquestionid = session()->get('abc');  
                    $result = question::where('id', $nextquestionid)->get();
                    session(['abc' => $nextquestionid + 1]);
                    return view('user.displayexam',compact('result'));
                }else{
                    $lastquestionid=session()->get('abc');
                    $result = question::where('id', $lastquestionid)->get();
                    session()->forget('abc');
                    session()->forget('current_questionid');
                    return view('user.displayexam',compact('result'))->with('lastquestionid',$lastquestionid);
                }                  
            }else if(!$request->session()->has('abc')){
              
                session(['current_questionid' => $arr[0][0]]);
                $nextquestionid = session()->get('current_questionid') + 1;  
                session(['current_questionid' => $nextquestionid]);
                $result = question::where('id', $nextquestionid)->get();            
                session(['abc' => session()->get('current_questionid') + 1]);
                return view('user.displayexam',compact('result'));
            }
        }
    }
}
