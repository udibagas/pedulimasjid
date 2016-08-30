{!! Form::model($donasi, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-horizontal']) !!}

<div class="well">
	<div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
		<label for="tanggal" class="col-md-2 control-label">Tanggal :</label>
		<div class="col-md-10">
			{{ Form::text('tanggal', $donasi->tanggal, ['class' => 'form-control', 'placeholder' => 'Tanggal']) }}
			@if ($errors->has('tanggal'))
			<span class="help-block">
				<strong>{{ $errors->first('tanggal') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('donatur') ? ' has-error' : '' }}">
		<label for="donatur" class="col-md-2 control-label">Donatur :</label>
		<div class="col-md-10">
			{{ Form::text('donatur', $donasi->donatur, ['class' => 'form-control', 'placeholder' => 'Donatur']) }}

			@if ($errors->has('donatur'))
			<span class="help-block">
				<strong>{{ $errors->first('donatur') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
		<label for="jumlah" class="col-md-2 control-label">Jumlah :</label>
		<div class="col-md-10">
			{{ Form::text('jumlah', $donasi->jumlah, ['class' => 'form-control', 'placeholder' => 'Jumlah']) }}

			@if ($errors->has('jumlah'))
			<span class="help-block">
				<strong>{{ $errors->first('jumlah') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
		<label for="keterangan" class="col-md-2 control-label">Keterangan :</label>
		<div class="col-md-10">
			{{ Form::text('keterangan', $donasi->keterangan, ['class' => 'form-control', 'placeholder' => 'Keterangan']) }}

			@if ($errors->has('keterangan'))
			<span class="help-block">
				<strong>{{ $errors->first('keterangan') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
		<label for="jenis" class="col-md-2 control-label">Jenis :</label>
		<div class="col-md-10">
			{{ Form::select('jenis', App\Donasi::getJenisList(), $donasi->jenis, ['class' => 'form-control', 'placeholder' => '-Pilih Jenis-']) }}

			@if ($errors->has('jenis'))
			<span class="help-block">
				<strong>{{ $errors->first('jenis') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('alokasi') ? ' has-error' : '' }}">
		<label for="alokasi" class="col-md-2 control-label">Alokasi :</label>
		<div class="col-md-10">
			{{ Form::text('alokasi', $donasi->alokasi, ['class' => 'form-control', 'placeholder' => 'Alokasi']) }}

			@if ($errors->has('alokasi'))
			<span class="help-block">
				<strong>{{ $errors->first('alokasi') }}</strong>
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
</div>

{!! Form::close() !!}
