@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Edit Profile</b></div>

                <div class="panel-body">
                    <!--  -->
                    {{ Form::open(array('url' => '', 'method' => 'post','class' => 'form-horizontal')) }}
                    {{ csrf_field() }}
                     <div class="row">
                        {{ HTML::link('/admin', "" , array('class' => 'btn btn-primary glyphicon glyphicon-arrow-left pull-right'))}}
                    </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-5">
                          <input type="name" class="form-control" id="name" name="name" required autofocus>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="oldPassword" class="col-sm-2 control-label">Old Password</label>
                        <div class="col-sm-5">
                          <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="newPassword" class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-5">
                          <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="confirmPassword" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-5">
                          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Update Profile</button>
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
