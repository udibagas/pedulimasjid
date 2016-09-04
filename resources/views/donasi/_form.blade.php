{!! Form::model($donasi, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-horizontal']) !!}

<div class="well">
	<div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
		<label for="tanggal" class="col-md-3 control-label">Tanggal Transfer :</label>
		<div class="col-md-9">
			{{ Form::text('tanggal', $donasi->tanggal, ['class' => 'form-control', 'placeholder' => 'Tanggal Transfer']) }}
			@if ($errors->has('tanggal'))
			<span class="help-block">
				<strong>{{ $errors->first('tanggal') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('pengirim') ? ' has-error' : '' }}">
		<label for="pengirim" class="col-md-3 control-label">Pengirim :</label>
		<div class="col-md-3">
			{{ Form::text('pengirim', $donasi->pengirim, ['class' => 'form-control', 'placeholder' => 'Nama Pengirim']) }}

			@if ($errors->has('pengirim'))
			<span class="help-block">
				<strong>{{ $errors->first('pengirim') }}</strong>
			</span>
			@endif
		</div>
		<div class="col-md-3">
			{{ Form::text('bank_pengirim', $donasi->bank_pengirim, ['class' => 'form-control', 'placeholder' => 'Bank Pengirim']) }}

			@if ($errors->has('bank_pengirim'))
			<span class="help-block">
				<strong>{{ $errors->first('bank_pengirim') }}</strong>
			</span>
			@endif
		</div>
		<div class="col-md-3">
			{{ Form::text('rekening_pengirim', $donasi->rekening_pengirim, ['class' => 'form-control', 'placeholder' => 'Rekening Pengirim']) }}

			@if ($errors->has('rekening_pengirim'))
			<span class="help-block">
				<strong>{{ $errors->first('rekening_pengirim') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('donatur') ? ' has-error' : '' }}">
		<label for="donatur" class="col-md-3 control-label">Atas Nama :</label>
		<div class="col-md-9">
			{{ Form::text('donatur', $donasi->donatur, ['class' => 'form-control', 'placeholder' => 'Atas Nama']) }}
			@if ($errors->has('donatur'))
			<span class="help-block">
				<strong>{{ $errors->first('donatur') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('penerima') ? ' has-error' : '' }}">
		<label for="penerima" class="col-md-3 control-label">Penerima :</label>
		<div class="col-md-3">
			{{ Form::text('penerima', $donasi->penerima, ['class' => 'form-control', 'placeholder' => 'Penerima']) }}

			@if ($errors->has('penerima'))
			<span class="help-block">
				<strong>{{ $errors->first('penerima') }}</strong>
			</span>
			@endif
		</div>
		<div class="col-md-3">
			{{ Form::text('bank_penerima', $donasi->bank_penerima, ['class' => 'form-control', 'placeholder' => 'Bank Penerima']) }}

			@if ($errors->has('bank_penerima'))
			<span class="help-block">
				<strong>{{ $errors->first('bank_penerima') }}</strong>
			</span>
			@endif
		</div>
		<div class="col-md-3">
			{{ Form::text('rekening_penerima', $donasi->rekening_penerima, ['class' => 'form-control', 'placeholder' => 'Rekening Penerima']) }}

			@if ($errors->has('rekening_penerima'))
			<span class="help-block">
				<strong>{{ $errors->first('rekening_penerima') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
		<label for="jumlah" class="col-md-3 control-label">Jumlah :</label>
		<div class="col-md-9">
			{{ Form::text('jumlah', $donasi->jumlah, ['class' => 'form-control', 'placeholder' => 'Jumlah']) }}

			@if ($errors->has('jumlah'))
			<span class="help-block">
				<strong>{{ $errors->first('jumlah') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
		<label for="jenis" class="col-md-3 control-label">Jenis :</label>
		<div class="col-md-9">
			{{ Form::select('jenis', App\Donasi::getJenisList(), $donasi->jenis, ['class' => 'form-control', 'placeholder' => '-- Pilih Jenis --']) }}

			@if ($errors->has('jenis'))
			<span class="help-block">
				<strong>{{ $errors->first('jenis') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
		<label for="keterangan" class="col-md-3 control-label">Keterangan :</label>
		<div class="col-md-9">
			{{ Form::text('keterangan', $donasi->keterangan, ['class' => 'form-control', 'placeholder' => 'Keterangan']) }}

			@if ($errors->has('keterangan'))
			<span class="help-block">
				<strong>{{ $errors->first('keterangan') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('alokasi') ? ' has-error' : '' }}">
		<label for="alokasi" class="col-md-3 control-label">Alokasi :</label>
		<div class="col-md-9">
			{{ Form::text('alokasi', $donasi->alokasi, ['class' => 'form-control', 'placeholder' => 'Alokasi']) }}

			@if ($errors->has('alokasi'))
			<span class="help-block">
				<strong>{{ $errors->first('alokasi') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('confirmed') ? ' has-error' : '' }}">
		<label for="confirmed" class="col-md-3 control-label">Confirmed :</label>
		<div class="col-md-9">
			{{ Form::select('confirmed', [0 => 'No', 1 => 'Yes'], $donasi->confirmed, ['class' => 'form-control', 'placeholder' => '-- Pilih Jenis --']) }}

			@if ($errors->has('confirmed'))
			<span class="help-block">
				<strong>{{ $errors->first('confirmed') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('bukti_transfer') ? ' has-error' : '' }}">
		<label for="bukti_transfer" class="col-md-3 control-label">Bukti Transfer :</label>
		<div class="col-md-9">
			<input type="file" name="bukti_transfer" class="note-image-input form-control" placeholder="Bukti Transfer">
			@if ($errors->has('bukti_transfer'))
			<span class="help-block">
				<strong>{{ $errors->first('bukti_transfer') }}</strong>
			</span>
			@endif

			@if ($donasi->bukti_transfer)
				<br>
				<img src="/{{ $donasi->bukti_transfer }}" alt="" class="img-responsive" />
			@endif
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-md-9 col-md-offset-3">
			<button type="sumbit" name="save" class="btn btn-info">SAVE</button>
		</div>
	</div>
</div>

{!! Form::close() !!}
