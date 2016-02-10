@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Manage Exam</b></div>

                <div class="panel-body">
                   <!--  Manage Exam Start -->
                   {{ Form::open(array('url' => 'updateExamStatus', 'method' => 'post')) }}
                    {{ csrf_field() }}

                    <div class="row">
                        {{ HTML::link('/admin', "" , array('class' => 'btn btn-primary glyphicon glyphicon-arrow-left pull-right'))}}
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Exam Name</th>
                                        <th>Duration (Minutes)</th>
                                        <th>Number of Question</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                            
                                <?php $i=1;?>
                                    @foreach($result as $result)
                                <tbody>
                                    <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $result->exam_name }}</td>
                                    <td>{{ $result->duration_per_que }}</td>
                                    <td>{{ $result->total_question }}</td>
                                    <td>
                                        <input name="<?php echo $i; ?>" type="radio" value="0" <?php if ($result->exam_status == 0) echo 'checked'; ?> >Active
                                        <input name="<?php echo $i; ?>" type="radio" value="1" <?php if ($result->exam_status == 1) echo 'checked'; ?> >Inactive
                                    </td>
                                    <?php $i++; ?>
                                    </tr>
                                <tbody>
                                @endforeach
                            </table>
                            <div align="center">
                                <button type="submit" class="btn btn-primary">UpdateStatus</button>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                   <!--  Manage Exam End -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
