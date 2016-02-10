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
                <div class="panel-heading"><b>Create Exam</b></div>

                <div class="panel-body">    
                   <!--  -->
                    {{ Form::open(array('url' => '/saveCreateExam', 'method' => 'post','class' => 'form-horizontal')) }}
                    {{ csrf_field() }}
                     <div class="row">
                        {{ HTML::link('/admin', "" , array('class' => 'btn btn-primary glyphicon glyphicon-arrow-left pull-right'))}}
                    </div>
                      <div class="form-group">
                        <label for="exam_name" class="col-sm-2 control-label">Exam Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="examName" name="exam_name" required autofocus>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-5">
                          <textarea class="form-control" rows="5" cols="5" name="description" required></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="total_question" class="col-sm-2 control-label">Total Question</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="totalQuestion" name="total_question" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="duration_per_que" class="col-sm-2 control-label">Duration (Minute)</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="duration" name="duration_per_que" required>               
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="passing_marks" class="col-sm-2 control-label">Passing Mark</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="passMasrk" name="passing_marks" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Create Exam</button>
                        </div>
                      </div>
                    {{ Form::close() }}
                   <!--  -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
