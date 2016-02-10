@extends('layouts.app')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Add Question In {{ $result->exam_name }} Exam</b></div>

                <div class="panel-body">
                    {{ Form::open(array('url' => 'addquestion', 'method' => 'post','class' => 'form-horizontal')) }}
                    {{ csrf_field() }}
                     <div class="row">
                        {{ HTML::link('/createquestion', "" , array('class' => 'btn btn-primary glyphicon glyphicon-arrow-left pull-right'))}}
                    </div>
                    {{ Form::hidden('exam_id', $result->id) }}

                      <div class="row">
                        <label for="remainingQuestion" class="pull-right control-label">Remaning Question 20</label>
                      </div>

                      <div class="form-group">
                        <label for="questionNumber" class="col-sm-2 control-label">Question No</label>
                        <label for="questionNumber" class="col-sm-1 control-label">1</label>
                      </div>

                      <div class="form-group">
                        <label for="question" class="col-sm-2 control-label">Quetion Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="questionName" name="question" required autofocus>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="opt_a" class="col-sm-2 control-label">Option A</label>
                        <div class="col-sm-8">
                          <input type="optionA" class="form-control" id="optionA" name="opt_a" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="opt_b" class="col-sm-2 control-label">Option B</label>
                        <div class="col-sm-8">
                          <input type="optionB" class="form-control" id="optionB" name="opt_b" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="opt_c" class="col-sm-2 control-label">Option C</label>
                        <div class="col-sm-8">
                          <input type="optionC" class="form-control" id="optionC" name="opt_c" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="opt_d" class="col-sm-2 control-label">Option D</label>
                        <div class="col-sm-8">
                          <input type="optionD" class="form-control" id="optionD" name="opt_d" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="opt_e" class="col-sm-2 control-label">Option E</label>
                        <div class="col-sm-8">
                          <input type="optionE" class="form-control" id="optionE" name="opt_e" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="correct_ans" class="col-sm-2 control-label">Correct Ans</label>
                        <div class="col-sm-2">
                        <select class="form-control" id="correctAns" name="correct_ans">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                            <option value="5">E</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="submit" class="btn btn-primary" value="Add Question" />
                        </div>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
