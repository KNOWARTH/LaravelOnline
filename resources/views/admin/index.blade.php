@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Admin Dashboard</b></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-1">
                            {{ HTML::link('manageexam', 'Manage Exam', array('class' => 'btn btn-primary'))}}
                        </div>

                        <div class="col-sm-2 col-sm-offset-1">
                            {{ HTML::link('createexam', 'Create Exam', array('class' => 'btn btn-primary'))}}
                        </div>

                        <div class="col-sm-2 col-sm-offset-1">
                            {{ HTML::link('editprofile', 'Edit Profile', array('class' => 'btn btn-primary'))}}
                        </div>

                        <div class="col-sm-2 col-sm-offset-1">
                         {{ HTML::link('createquestion', 'Create Questions', array('class' => 'btn btn-primary'))}}
                        </div>
                    </div>

                    <div class="row" style="margin-top:20px;">
                        <div class="col-sm-2 col-sm-offset-1">
                         {{ HTML::link('createadmin', 'Create New Admin', array('class' => 'btn btn-primary'))}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
