{!! Form::model($inbox, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-vertical']) !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{{ Form::text('name', $inbox->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}

	@if ($errors->has('name'))
	<span class="help-block">
		<strong>{{ $errors->first('name') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	{{ Form::text('email', $inbox->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}

	@if ($errors->has('email'))
	<span class="help-block">
		<strong>{{ $errors->first('email') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
	{{ Form::text('subject', $inbox->subject, ['class' => 'form-control', 'placeholder' => 'Subject']) }}

	@if ($errors->has('subject'))
	<span class="help-block">
		<strong>{{ $errors->first('subject') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
	{{ Form::textarea('body', $inbox->body, ['class' => 'form-control', 'placeholder' => 'Body', 'rows' => 6]) }}

	@if ($errors->has('body'))
	<span class="help-block">
		<strong>{{ $errors->first('body') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	<button type="sumbit" name="save" class="btn btn-brown">KIRIM PESAN</button>
</div>


{!! Form::close() !!}
