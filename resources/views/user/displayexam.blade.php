<?php session_start(); ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Start Exam {{ '#' }}</b></div>

                <div class="panel-body">
                    <!--  -->
                    {{ Form::open(array('url' => '/saveanswer', 'method' => 'post','class' => 'form-horizontal')) }}
                    {{ csrf_field() }}
                    	
                    	@foreach($result as $data)
                    	{{ Form::hidden('examid', $data->exam_id) }}
                    	{{ Form::hidden('questionid', $data->id) }}
                    	
						<div class="row"> 
		                    <label for="questionNo" class="col-sm-1 control-label"><?php if(isset($_GET['page'])){ echo $_GET['page'].'.';} else if(!isset($_GET['page'])) { echo "1."; } ?></label>
		                    <div class="pull-left" class="col-sm-10">
		                    <label for="question" class="control-label">{{$data->question}}</label>
		                    </div>
						</div>                    	

						<div class="row">
	                        <label for="option_a" class="col-sm-1 col-sm-offset-1 control-label">A.</label>
	                        <div class="radio">
							  <label>
								{{ Form::radio('useranswer',"1") }}
							    {{$data->opt_a}}
							  </label>
							</div>
						</div>

						<div class="row">
	                        <label for="option_b" class="col-sm-1 col-sm-offset-1 control-label">B.</label>
	                        <div class="radio">
							  <label>
								{{ Form::radio('useranswer',"2") }}
							    {{$data->opt_b}}
							  </label>
							</div>
						</div>

						<div class="row">
	                        <label for="option_c" class="col-sm-1 col-sm-offset-1 control-label">C.</label>
	                        <div class="radio">
							  <label>
								{{ Form::radio('useranswer',"3") }}
							    {{$data->opt_c}}
							  </label>
							</div>
						</div>

						<div class="row">
	                        <label for="option_c" class="col-sm-1 col-sm-offset-1 control-label">D.</label>
	                        <div class="radio">
							  <label>
								{{ Form::radio('useranswer',"4") }}
							    {{$data->opt_d}}
							  </label>
							</div>
						</div>

						<div class="row">
	                        <label for="option_e" class="col-sm-1 col-sm-offset-1 control-label">E.</label>
	                        <div class="radio">
							  <label>
								{{ Form::radio('useranswer',"5") }}
							    {{$data->opt_e}}
							  </label>
							</div>
						</div>

						@endforeach

						 <!-- When we untill reach upto the last question submit and finish button will be displayed -->
						 <!-- and when we reach upto last question finish button will be display -->
						<?php
	                    if(!isset($lastquestionid)){ ?>
	                    	{{ Form::submit('Next', array('class' => 'btn btn-primary col-sm-offset-6')) }}
                			<!-- {{ HTML::link('/showresult', "Finish Exam" , array('class' => 'btn btn-primary col-sm-offset-1'))}} -->
                			<!-- {{ Form::submit('Finish Exam',array('class' => 'btn btn-primary col-sm-offset-8','name' => 'finishexam'))}} -->
	                    <?php }else if(isset($lastquestionid)){ ?>          
                			{{ Form::submit('Finish Exam',array('class' => 'btn btn-primary col-sm-offset-8','name' => 'finishexam'))}}
                		<?php } ?>
					{{ Form::close() }}
					<!--  -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
