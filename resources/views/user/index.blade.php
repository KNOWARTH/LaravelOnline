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
                            <a href="exam" class="btn btn-primary">Exam</a>
                        </div>

                        <div class="col-sm-3 col-sm-offset-1">
                            <a href="viewresult" class="btn btn-primary">View Result</a>
                        </div>
                        
                        <div class="col-sm-3 col-sm-offset-1">
                            <a href="editprofile" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
