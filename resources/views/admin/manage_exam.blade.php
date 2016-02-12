@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Manage Exam</b></div>
                <p style="color:red"><?php echo Session::get('message');?></p>
                <div class="panel-body">
    
                    <?php if (isset($searchResult)){ ?>
                    <div class="row">
                        <div class="col-sm-3">
                        {{ HTML::link('createexam', 'Create Exam', array('class' => 'btn btn-primary pull-left'))}}
                        </div>
                        <div class="col-sm-3">
                        {!! Form::open(array('url' => 'search','method' => 'post')) !!}
                        {!! Form::text('search', null,array('required','class'=>'form-control pull-right','placeholder'=>'Search Exam...')) !!}
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
                                return "<a class='btn btn-primary pull-left' href='editExam/".$searchResult->id."'>Edit</a>";
                                }); ?>

                             <?php $searchResult->addColumn('', 'Manage Questions', function($searchResult) {
                                return "<a class='btn btn-primary pull-left' href='ManageQuestions/".$searchResult->id."'>Manage Question</a>";
                                }); ?>       
                            <div align="center"> <?php echo $searchResult->render(); ?></div>
                            <div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    

                     
                   <!--  Manage Exam Start -->
                   <?php if (isset($result)){ ?>
                   <div class="row">
                        <div class="col-sm-3">
                        {{ HTML::link('createexam', 'Create Exam', array('class' => 'btn btn-primary pull-left'))}}
                        </div>
                        <div class="col-sm-3">
                        {!! Form::open(array('url' => 'search','method' => 'post')) !!}
                        {!! Form::text('search', null,array('required','class'=>'form-control pull-right','placeholder'=>'Search Exam...')) !!}
                        </div>
                        <div class="col-sm-3">
                        {!! Form::submit('Search',array('class'=>'btn btn-default pull-left')) !!}
                        {!! Form::close() !!}
                        </div>
                        <div class="col-sm-3">
                        {{ HTML::link('admin', "" , array('class' => 'btn btn-primary glyphicon glyphicon-arrow-left pull-right'))}}
                        </div>
                    </div>
                    {{ Form::open(array('url' => 'updateExamStatus', 'method' => 'post')) }}
                    {{ csrf_field() }}

                    
                    
                    <div class="row">
                        <div class="table-responsive">
                            <?php $result->addColumn('', 'Action', function($result) {
                                return "<a class='btn btn-primary pull-left' href='editExam/".$result->id."'>Edit</a>";
                                }); ?>

                            <?php $result->addColumn('', 'Manage Questions', function($result) {
                                return "<a class='btn btn-primary pull-left' href='manageQuestions/".$result->id."'>Manage Question</a>";
                                }); ?>      
                            <div align="center"> <?php echo $result->render(); ?></div>
                            <div>

                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                    <?php } ?>
                   <!--  Manage Exam End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{HTML::script('js/sorttable.js')}} -->
<!-- <script src="/sorttable.js"></script> -->
@endsection
