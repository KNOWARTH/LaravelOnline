@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">View Result</div>

                <div class="panel-body">
                    {{ Form::open(array('url' => '', 'method' => 'post')) }}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Exam Name</th>
                                        <th>Marks</th>
                                        <th>Result</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <td>1</td>
                                    <td>PHP</td>
                                    <td>90</td>
                                    <td>
                                        <span class="label label-success">Pass</span>
                                    </td>
                                    <td></td>
                                </tbody>

                                <tbody>
                                    <td>2</td>
                                    <td>HTML</td>
                                    <td>30</td>
                                    <td>
                                        <span class="label label-danger">Fail</span>
                                    </td>
                                    <td>
                                        <span class="glyphicon glyphicon-repeat"></span>
                                    </td>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
