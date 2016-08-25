{!! Form::model($masjid, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-horizontal']) !!}

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
	<label for="nama" class="col-md-2 control-label">Nama :</label>
	<div class="col-md-10">
		{{ Form::text('nama', $masjid->nama, ['class' => 'form-control', 'placeholder' => 'Nama']) }}

		@if ($errors->has('nama'))
		<span class="help-block">
			<strong>{{ $errors->first('nama') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
	<label for="alamat" class="col-md-2 control-label">Alamat :</label>
	<div class="col-md-10">
		{{ Form::textarea('alamat', $masjid->alamat, ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => 3]) }}

		@if ($errors->has('alamat'))
		<span class="help-block">
			<strong>{{ $errors->first('alamat') }}</strong>
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
