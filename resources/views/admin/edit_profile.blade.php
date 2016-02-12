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
    @include('flash::message')
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Edit Profile</b></div>

                <div class="panel-body">
                    <!--  -->
                    {{ Form::open(array('url' => 'updateprofile', 'method' => 'post','class' => 'form-horizontal')) }}
                    {{ csrf_field() }}
                    {{ Form::hidden('id',$result->id) }}
                     <div class="row">
                        {{ HTML::link('/admin', "" , array('class' => 'btn btn-primary glyphicon glyphicon-arrow-left pull-right'))}}
                    </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-5">
                          <input type="name" class="form-control" id="name" name="name" value="{{$result->name}}" required autofocus>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="email" name="email" value="{{$result->email}}" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Enter password to confirm changes</label>
                        <div class="col-sm-5">
                          <input type="password" class="form-control" id="password" name="password" required>
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
