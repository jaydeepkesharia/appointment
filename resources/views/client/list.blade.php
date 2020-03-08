@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Clients List</div>
        	<div class="panel-body">
        		<table class="table table-border">
                	<tr>
                		<th>Srno</th>
                		<th>Name</th>
                		<th>Email</th>
                		<th>Phone</th>
                		<th>Action</th>
                	</tr>
	                    	<?php  if($list->isNotEmpty()){ ?>
	                    	<?php $i = 1; foreach ($list as $k => $v): ?>
	                    		<tr id="tr_{{$v->id}}">
	                    			<td>{{$i++}}</td>
	                    			<td>
	                    				<div contenteditable="true" onBlur ="updateValue(this,'name',{{$v->id}})" onClick="activate(this)">
	                    					{{$v->name}}
	                    				</div>
	                    			</td>
	                    			<td>
	                    				<div contenteditable="true" onBlur ="updateValue(this,'email',{{$v->id}})" onClick="activate(this)">
	                    					{{$v->email}}
	                    				</div>
	                    			</td>
	                    			<td>
	                    				<div contenteditable="true" onBlur ="updateValue(this,'phone',{{$v->id}})" onClick="activate(this)">
	                    					{{$v->phone}}
	                    				</div>
	                    			</td>
	                    			<td>
	                                    <form action="{{url('clients')}}/{{$v->id}}" method="post">
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clients Form</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('clients') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}"  autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            	<input type="submit" name="submit" value="Save"  class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	
	function updateValue(element,column,id){
    		var value = element.innerText;
    		
    		$.ajax({
    			url:"{{url('clients')}}/<?php echo $v->id ;?>",
    			type:'POST',
    			data:{
    				'value':value,
    				'column':column,
    				'id':id,
    				 '_token': "{{ csrf_token() }}",
    				  '_method': "PUT" ,
    			},
    			dataType: 'json',
    			success:function(result){
    				console.log(result);
    			}
    		})
    }
</script>
@endsection