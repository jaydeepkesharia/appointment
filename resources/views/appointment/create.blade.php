@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$title}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('appointments') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('client') ? ' has-error' : '' }}">
                            <label for="client" class="col-md-12 pull-left">Client*</label>

                            <div class="col-md-12">

                                <select id="client" name="client" class="form-control">
                        			<option value="">--SELECT CLIENT NAME--</option>
                        			<?php foreach ($client as $k => $v) { ?>
                        				<option value="{{$v->name}}">{{$v->name}}</option>
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
                        				<option value="{{$v->name}}">{{$v->name}}</option>
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
                               
						        <input type="datetime-local" name="start_time" class="form-control" id="datetimepicker">
						         
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
                                <input id="finish_time" type="datetime-local" class="form-control" name="finish_time" value="{{ old('finish_time') }}"  autofocus>

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
                                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}"  autofocus>

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
                                <textarea class="form-control" rows="7" name="comments"></textarea>

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

<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<script src="http://cdn.craig.is/js/rainbow-custom.min.js"></script>
<script>
      $(document).ready(function() {
           // $.datetimepicker.setLocale('pt-BR');
        $('#datetimepicker').datetimepicker();
      });
</script> -->
@endsection