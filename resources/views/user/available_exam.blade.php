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
                <div class="panel-heading"><b>Available Exam</b></div>

                <div class="panel-body">
                    <!-- Collapse Start -->
                    @foreach($result as $val) 
                      <div class="panel-group" id="{{$val->id}}" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="{{$val->id}}">
                            <h4 class="panel-title">
                              <a role="button" data-toggle="{{$val->id}}" data-parent="#{{$val->id}}" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{$val->exam_name}}
                              </a>
                            </h4>
                          </div>

                          <div id="collapseOne" class="panel-collapse {{$val->id}}" role="tabpanel" aria-labelledby="{{$val->id}}">
                            <div class="panel-body">
                              {{$val->description}}
                              <div class="text-right">
                                  {{ HTML::link($val->id.'/startexam', "Start Exam" , array('class' => 'btn btn-primary'))}}
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      <!-- Collapse End -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection