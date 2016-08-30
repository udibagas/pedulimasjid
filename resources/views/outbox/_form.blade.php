{!! Form::model($outbox, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-vertical']) !!}

	<div class="well">
		{!! Form::hidden('inbox_id', request('inbox_id')) !!}

		<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
			{{ Form::textarea('body', $outbox->body, ['class' => 'form-control', 'placeholder' => 'Body', 'rows' => 6]) }}

			@if ($errors->has('body'))
			<span class="help-block">
				<strong>{{ $errors->first('body') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group">
			<button type="sumbit" name="save" class="btn btn-info">BALAS</button>
		</div>
	</div>

{!! Form::close() !!}
