@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$title}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('appointments') }}/{{$appointment->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('client') ? ' has-error' : '' }}">
                            <label for="client" class="col-md-12 pull-left">Client*</label>

                            <div class="col-md-12">

                                <select id="client" name="client" class="form-control">
                        			<option value="">--SELECT CLIENT NAME--</option>
                        			<?php foreach ($client as $k => $v) { ?>
                        				<option value="{{$v->name}}"<?php  if(isset($appointment->id)) { echo $appointment->client == $v->name ? 'selected':''; }?>>{{$v->name}}</option>
                        			<?php } ?>
                        		</select>

                                @if ($errors->has('client'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('client') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('employee') ? ' has-error' : '' }}">
                            <label for="employee" class="col-md-12">Employee*</label>

                            <div class="col-md-12">
                                <select id="employee" name="employee" class="form-control">
                        			<option value="">--SELECT EMPLOYEE NAME--</option>
                        			<?php foreach ($employee as $k => $v) { ?>
                        				<option value="{{$v->name}}"<?php  if(isset($appointment->id)) { echo $appointment->employee == $v->name ? 'selected':''; }?>>{{$v->name}}</option>
                        			<?php } ?>
                        		</select>

                                @if ($errors->has('employee'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employee') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
                            <label for="start_time" class="col-md-12">Start Time*</label>

                            <div class="col-md-12">
                               
						        <input type="text" name="start_time" class="form-control" id="datetimepicker" value="<?php echo isset($appointment->start_time) ? $appointment->start_time : '';?>">
						         
                                @if ($errors->has('start_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('finish_time') ? ' has-error' : '' }}">
                            <label for="finish_time" class="col-md-12">Finish Time*</label>

                            <div class="col-md-12">
                                <input id="finish_time" type="text" class="form-control" name="finish_time" value="<?php echo isset($appointment->finish_time) ? $appointment->finish_time : '';?>"  autofocus>

                                @if ($errors->has('finish_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('finish_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-12">Price</label>

                            <div class="col-md-12">
                                <input id="price" type="number" class="form-control" name="price" value="<?php echo isset($appointment->price) ? $appointment->price : '';?>">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                            <label for="comments" class="col-md-12">Comments</label>

                            <div class="col-md-12">
                                <textarea class="form-control" rows="7" name="comments"><?php echo isset($appointment->comments) ? $appointment->comments :''; ?></textarea>

                                @if ($errors->has('comments'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            	<input type="submit" name="submit" value="Save"  class="btn btn-success">
                            	<a href="{{url('appointments')}}" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection