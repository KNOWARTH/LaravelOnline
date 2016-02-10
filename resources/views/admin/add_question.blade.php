@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Add Question</b></div>

                <div class="panel-body">
                    {{ Form::open(array('url' => '', 'method' => 'post')) }}
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
                                        <th>Total Question</th>
                                        <th>Question Added</th>
                                        <th>Question Not Added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <?php $i=1;?>
                                    @foreach($result as $result)
                                <tbody>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $result->exam_name }}</td>
                                    <td>{{ $result->total_question }}</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>
                                        {{ HTML::link('add_question_exam/'.$result->id, "Add" , array('class' => 'btn btn-primary'))}}
                                    </td>
                                <tbody>
                                @endforeach


                               

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
