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

<div class="form-group{{ $errors->has('provinsi_id') ? ' has-error' : '' }}">
	<label for="provinsi_id" class="col-md-2 control-label">Provinsi:</label>
	<div class="col-md-10">
		{{ Form::select('provinsi_id', \App\Lokasi::propinsi()->pluck('nama', 'id'), $masjid->provinsi_id, ['class' => 'form-control', 'placeholder' => '-- Provinsi --']) }}

		@if ($errors->has('provinsi_id'))
		<span class="help-block">
			<strong>{{ $errors->first('provinsi_id') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('kota_id') ? ' has-error' : '' }}">
	<label for="kota_id" class="col-md-2 control-label">Kota:</label>
	<div class="col-md-10">
		{{ Form::select('kota_id', [], $masjid->kota_id, ['class' => 'form-control', 'placeholder' => '-- Kota --']) }}

		@if ($errors->has('kota_id'))
		<span class="help-block">
			<strong>{{ $errors->first('kota_id') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('kecamatan_id') ? ' has-error' : '' }}">
	<label for="kecamatan_id" class="col-md-2 control-label">Kecamatan:</label>
	<div class="col-md-10">
		{{ Form::select('kecamatan_id', [], $masjid->kecamatan_id, ['class' => 'form-control', 'placeholder' => '-- Kecamatan --']) }}

		@if ($errors->has('kecamatan_id'))
		<span class="help-block">
			<strong>{{ $errors->first('kecamatan_id') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('kelurahan_id') ? ' has-error' : '' }}">
	<label for="kelurahan_id" class="col-md-2 control-label">Kelurahan:</label>
	<div class="col-md-10">
		{{ Form::select('kelurahan_id', [], $masjid->kelurahan_id, ['class' => 'form-control', 'placeholder' => '-- Kelurahan --']) }}

		@if ($errors->has('kelurahan_id'))
		<span class="help-block">
			<strong>{{ $errors->first('kelurahan_id') }}</strong>
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

<div class="form-group{{ $errors->has('kode_pos') ? ' has-error' : '' }}">
	<label for="kode_pos" class="col-md-2 control-label">Kode Pos:</label>
	<div class="col-md-10">
		{{ Form::text('kode_pos', $masjid->kode_pos, ['class' => 'form-control', 'placeholder' => 'Kode Pos']) }}

		@if ($errors->has('kode_pos'))
		<span class="help-block">
			<strong>{{ $errors->first('kode_pos') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
	<label for="lat" class="col-md-2 control-label">Latitude:</label>
	<div class="col-md-10">
		{{ Form::text('lat', $masjid->lat, ['class' => 'form-control', 'placeholder' => 'Latitude']) }}

		@if ($errors->has('lat'))
		<span class="help-block">
			<strong>{{ $errors->first('lat') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('long') ? ' has-error' : '' }}">
	<label for="long" class="col-md-2 control-label">Longitude:</label>
	<div class="col-md-10">
		{{ Form::text('long', $masjid->long, ['class' => 'form-control', 'placeholder' => 'Longitude']) }}

		@if ($errors->has('long'))
		<span class="help-block">
			<strong>{{ $errors->first('long') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('kontak_nama') ? ' has-error' : '' }}">
	<label for="kontak_nama" class="col-md-2 control-label">CP :</label>
	<div class="col-md-10">
		{{ Form::text('kontak_nama', $masjid->kontak_nama, ['class' => 'form-control', 'placeholder' => 'CP']) }}

		@if ($errors->has('kontak_nama'))
		<span class="help-block">
			<strong>{{ $errors->first('kontak_nama') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('kontak_telp') ? ' has-error' : '' }}">
	<label for="kontak_telp" class="col-md-2 control-label">CP Phone:</label>
	<div class="col-md-10">
		{{ Form::text('kontak_telp', $masjid->kontak_telp, ['class' => 'form-control', 'placeholder' => 'CP Phone']) }}

		@if ($errors->has('kontak_telp'))
		<span class="help-block">
			<strong>{{ $errors->first('kontak_telp') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('kegiatan') ? ' has-error' : '' }}">
	<label for="kegiatan" class="col-md-2 control-label">Kegiatan Rutin:</label>
	<div class="col-md-10">
		{{ Form::textarea('kegiatan', $masjid->kegiatan, ['class' => 'form-control', 'placeholder' => 'Kegiatan Rutin', 'rows' => 3]) }}

		@if ($errors->has('kegiatan'))
		<span class="help-block">
			<strong>{{ $errors->first('kegiatan') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('kebutuhan') ? ' has-error' : '' }}">
	<label for="kebutuhan" class="col-md-2 control-label">Kebutuhan Utama:</label>
	<div class="col-md-10">
		{{ Form::textarea('kebutuhan', $masjid->kebutuhan, ['class' => 'form-control', 'placeholder' => 'Kebutuhan Utama', 'rows' => 3]) }}

		@if ($errors->has('kebutuhan'))
		<span class="help-block">
			<strong>{{ $errors->first('kebutuhan') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
	<label for="img" class="col-md-2 control-label">Image:</label>
	<div class="col-md-10">
		<input type="file" name="img" class="note-image-input form-control" placeholder="Thumbnail">
		@if ($errors->has('img'))
		<span class="help-block">
			<strong>{{ $errors->first('img') }}</strong>
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

@push('script')

<script type="text/javascript">

	$('select').chosen();

	$('[name=provinsi_id]').change(function() {
		$.ajax({
			url: '/lokasi?propinsi='+this.value,
			type: 'GET',
			dataType: 'json',
			success: function(j) {
				$('[name=kota_id]').html('<option value="">-- Kota --</option>');
				$.each(j, function(i, v) {
					$('[name=kota_id]').append('<option value="'+v.id+'">'+v.nama+'</option>');
				});
				$('[name=kota_id]').trigger("chosen:updated");
			}
		});
	});

	$('[name=kota_id]').change(function() {
		$.ajax({
			url: '/lokasi?kota='+this.value,
			type: 'GET',
			dataType: 'json',
			success: function(j) {
				$('[name=kecamatan_id]').html('<option value="">-- Kecamatan --</option>');
				$.each(j, function(i, v) {
					$('[name=kecamatan_id]').append('<option value="'+v.id+'">'+v.nama+'</option>');
				});
				$('[name=kecamatan_id]').trigger("chosen:updated");
			}
		});
	});

	$('[name=kecamatan_id]').change(function() {
		$.ajax({
			url: '/lokasi?kecamatan='+this.value,
			type: 'GET',
			dataType: 'json',
			success: function(j) {
				$('[name=kelurahan_id]').html('<option value="">-- Kelurahan --</option>');
				$.each(j, function(i, v) {
					$('[name=kelurahan_id]').append('<option value="'+v.id+'">'+v.nama+'</option>');
				});
				$('[name=kelurahan_id]').trigger("chosen:updated");
			}
		});
	});
</script>

@endpush
