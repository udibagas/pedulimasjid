{!! Form::model($masjid, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-horizontal']) !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-2 control-label">Title :</label>
	<div class="col-md-10">
		{{ Form::text('name', $masjid->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}

		@if ($errors->has('name'))
		<span class="help-block">
			<strong>{{ $errors->first('name') }}</strong>
		</span>
		@endif
	</div>
</div>

<hr>

<div class="form-group">
	<div class="col-md-10 col-md-offset-2">
		<button type="sumbit" name="save" class="btn btn-info">SAVE</button>
	</div>
</div>


{!! Form::close() !!}
