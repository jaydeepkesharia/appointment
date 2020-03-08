@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <a href="{{url('appointments/create')}}" style="margin-bottom: 10px" class="btn btn-primary">Create New Appointment</a>
        <div class="panel panel-default">
            <div class="panel-heading">{{$title}}</div>
        	<div class="panel-body">
        		<table class="table table-border">
                	<tr>
                		<th>Srno</th>
                		<th>Client</th>
                		<th>Employee</th>
                		<th>Start Time</th>
                		<th>Finish Time</th>
                		<th>Price</th>
                		<th>Comments</th>
                		<th>Action</th>
                	</tr>
	                    	<?php  if($list->isNotEmpty()){ ?>
	                    	<?php $i = 1; foreach ($list as $k => $v): ?>
	                    		<tr id="tr_{{$v->id}}">
	                    			<td>{{$i++}}</td>
	                    			<td>
	                    					{{$v->client}}
	                    			</td>
	                    			<td>
	                    					{{$v->employee}}
	                    			</td>
	                    			<td>
	                    					{{$v->start_time}}
	                    			</td>
	                    			<td>
	                    					{{$v->finish_time}}
	                    			</td>
	                    			<td>{{$v->price}}</td>
	                    			<td>{{$v->comments}}</td>
	                    			<td>
                                        <a href="{{url('appointments')}}/<?php echo $v->id ;?>/edit" class="btn btn-default">
                                        Edit
                                        </a>
	                                    <form action="{{url('appointments')}}/{{$v->id}}" method="post">
	                                        {{ csrf_field() }}
	                                        {{ method_field('DELETE') }}
	                                        <input type="submit" value="Delete" class="btn btn-danger">
	                                    </form>
	                    			</td>
	                    		</tr>
	                    	<?php endforeach ?>
	                    	<?php 	}else{ ?>
	                    		<tr>	
	                    			<td colspan="5" style="text-align: center;">No Records Found</td>
	                    		</tr>
	                    	<?php 	} ?>
	                    </table>
	            <div style="text-align: center;">{{ $list->links() }}</div>
        	</div>
        </div>
    </div>
</div>
@endsection