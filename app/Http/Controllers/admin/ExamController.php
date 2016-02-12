<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\exam;
use Session;
use Flash;
use Validator;
use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    //Check Authentication.
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Display manage Exam page with resource.
    public function index()
    {
        $result = exam::sorted()->paginate(5);
        $table = \Table::create($result, ['id','exam_name', 'total_question','duration_per_que','mark_per_que','passing_marks','exam_status']);
        return view('admin.manage_exam')->with('result',$table);
    }

    //Display manage Exam page with Search Result.
    public function search(Request $request)
    { 
        $post = $request->all();
        $query = $post['search'];;
        $result = exam::where('exam_name', 'LIKE', '%' . $query . '%')->paginate(5);
        $table = \Table::create($result, ['id','exam_name', 'total_question','duration_per_que','mark_per_que','passing_marks','exam_status']);
        return view('admin.manage_exam')->with('searchResult',$table);
     }

    //Show the Create Exam form for creating a new resource.
    public function create()
    {
        return view('admin.create_exam');
    }

    // Store a newly created Exam resource in storage.
    public function store(Request $request)
    {
        $post = $request->all();
        $validator=exam::validateData($post);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            unset($post['_token']);
            $exam = new exam;
            foreach ($post as $key => $value){
                $exam->$key = $value;
            }
            $result = $exam->save();
            if($result>0){
                Flash::success('Exam successfully inserted');
            }
            return redirect('admin');
        }
    }

    //Show the EditExam form for editing the specified resource.
    public function edit($id)
    {
        $result = exam::where('id',$id)->first();
        return view('admin.edit_exam')->with('result',$result);
    }

    //Update the Exam resource in storage.
    public function update(Request $request)
    {
        $post = $request->all();
        $validator=exam::validateUpdateData($post);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            unset($post['_token']);
            $result = exam::where('id',$post['id'])->update($post);
            Flash::success('Exam successfully Updated');
            }
        return redirect('manageexam');       
    }
    
}
