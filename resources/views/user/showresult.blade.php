@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b># Result</b></div>

                <div class="panel-body">
                    <div class="table-responsive">
                    	<table class="table table-striped">
                    		<thead>
                    			<tr>
                    				<th>Exam Name</th>
                    				<th>Date</th>
                    				<th>Total Marks</th>
                    				<th>Passing Marks</th>
                    				<th>Marks</th>
                    				<th>Pass / Fail</th>
                    			</tr>
                    		</thead>

                    		<tbody>
                    			<tr>
                    				<td>{{ $result[0]['exam_name'] }}</td>
                    				<td>{{ $examdate}}</td>
                    				<td>{{ $total_marks }}</td>
                    				<td>{{ $passing_mark }}</td>
                    				<td>{{ $marks }}</td>
                    				<td><?php if($marks >= $passing_mark){ echo "<span style='color:green;'>Pass"; }else if($marks < $passing_mark){ echo "<span style='color:red;'>Fail"; } ?></td>
                    			</tr>
                    		</tbody>
                    	</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection