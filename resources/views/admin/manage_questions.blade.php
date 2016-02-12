@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            
                <div class="panel-heading"><b>Manage Questions</b></div>

                <div class="panel-body">
 

                <!--  Searched Questions Start -->
                   <?php if (isset($searchResult)){ ?>
                   <div class="row">
                        <div class="col-sm-3">
                        {{ HTML::link('add_question_exam/'. $exam_id, 'Add Questions', array('class' => 'btn btn-primary pull-left'))}}
                        </div>
                        <div class="col-sm-3">
                        {!! Form::open(array('url' => 'search','method' => 'post')) !!}
                        {{ Form::hidden('exam_id',$exam_id) }}
                        {!! Form::text('search', null,array('required','class'=>'form-control pull-right','placeholder'=>'Search Question...')) !!}
                        </div>
                        <div class="col-sm-3">
                        {!! Form::submit('Search',array('class'=>'btn btn-default pull-left')) !!}
                        {!! Form::close() !!}
                        </div>
                        <div class="col-sm-3">
                        {{ HTML::link('manageexam', "" , array('class' => 'btn btn-primary glyphicon glyphicon-arrow-left pull-right'))}}
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="table-responsive"> 
                            <?php $searchResult->addColumn('', 'Action', function($searchResult) {
                                return "<a class='btn btn-primary pull-left' href='editQuestion/".$searchResult->id."'>Edit</a>  <a class='btn btn-primary col-sm-offset-1' href='deleteQuestion/".$searchResult->id."'>Delete</a> ";
                                }); ?>
                            <div align="center"> <?php echo $searchResult->render(); ?></div>
                            <div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                   <!--  Searched Question End -->    

                    
                   <!--  Manage Questions Start -->
                   <?php if (isset($result)){ ?>
                   <div class="row">
                        <div class="col-sm-3">
                        {{ HTML::link('add_question_exam/'. $exam_id, 'Add Questions', array('class' => 'btn btn-primary pull-left'))}}
                        </div>
                        <div class="col-sm-3">
                        {!! Form::open(array('url' => 'search/','method' => 'post')) !!}
                        {{ Form::hidden('exam_id',$exam_id) }}
                        {!! Form::text('search', null,array('required','class'=>'form-control pull-right','placeholder'=>'Search Question...')) !!}
                        </div>
                        <div class="col-sm-3">
                        {!! Form::submit('Search',array('class'=>'btn btn-default pull-left')) !!}
                        {!! Form::close() !!}
                        </div>
                        <div class="col-sm-3">
                        {{ HTML::link('manageexam', "" , array('class' => 'btn btn-primary glyphicon glyphicon-arrow-left pull-right'))}}
                        </div>
                    </div>
                   

                    <div class="row">
                        <div class="table-responsive"> 

                           <?php $result->addColumn('', 'Action', function($result) {
                                return "
                                        <a class='btn btn-primary pull-left' href='../editQuestion/$result->id'  >Edit   </a>  
                                        <a class='btn btn-primary col-sm-offset-1' href='../deleteQuestion/".$result->id."'>Delete</a> 
                                        ";
                                }); ?>
                            <div align="center"> <?php echo $result->render(); ?></div>
                            <div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                   <!--  Manage Question End -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
