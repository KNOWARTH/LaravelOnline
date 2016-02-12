@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-1">
                            <a href="exam">
                            {{ HTML::image('assests/img/exam.jpg','Exam',array('class' => 'img-thumbnail img-responsive')) }}
                            </a>
                        </div>

                        <div class="col-sm-3 col-sm-offset-1">
                            <a href="editprofile">
                            {{ HTML::image('assests/img/edit_profile.png','Edit Profile',array('class' => 'img-thumbnail img-responsive')) }}
                            </a>
                        </div>

                        <div class="col-sm-3 col-sm-offset-1">
                            <a href="viewresult">
                            {{ HTML::image('assests/img/result.png','Edit Profile',array('class' => 'img-thumbnail img-responsive')) }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
