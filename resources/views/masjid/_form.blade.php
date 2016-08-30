{!! Form::model($masjid, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-horizontal']) !!}

<div class="row">
	<div class="col-md-8">
		<div class="well">
			<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
				<label for="nama" class="col-md-3 control-label">Nama Masjid:</label>
				<div class="col-md-9">
					{{ Form::text('nama', $masjid->nama, ['class' => 'form-control', 'placeholder' => 'Nama Masjid']) }}

					@if ($errors->has('nama'))
					<span class="help-block">
						<strong>{{ $errors->first('nama') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kontak_nama') ? ' has-error' : '' }}">
				<label for="kontak_nama" class="col-md-3 control-label">Contact Person :</label>
				<div class="col-md-5">
					{{ Form::text('kontak_nama', $masjid->kontak_nama, ['class' => 'form-control', 'placeholder' => 'CP Name']) }}

					@if ($errors->has('kontak_nama'))
					<span class="help-block">
						<strong>{{ $errors->first('kontak_nama') }}</strong>
					</span>
					@endif
				</div>
				<div class="col-md-4">
					{{ Form::text('kontak_telp', $masjid->kontak_telp, ['class' => 'form-control', 'placeholder' => 'CP Phone']) }}

					@if ($errors->has('kontak_telp'))
					<span class="help-block">
						<strong>{{ $errors->first('kontak_telp') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kegiatan') ? ' has-error' : '' }}">
				<label for="kegiatan" class="col-md-3 control-label">Kegiatan Rutin:</label>
				<div class="col-md-9">
					{{ Form::textarea('kegiatan', $masjid->kegiatan, ['class' => 'form-control', 'placeholder' => 'Kegiatan Rutin', 'rows' => 5]) }}

					@if ($errors->has('kegiatan'))
					<span class="help-block">
						<strong>{{ $errors->first('kegiatan') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kebutuhan') ? ' has-error' : '' }}">
				<label for="kebutuhan" class="col-md-3 control-label">Kebutuhan Utama:</label>
				<div class="col-md-9">
					{{ Form::textarea('kebutuhan', $masjid->kebutuhan, ['class' => 'form-control', 'placeholder' => 'Kebutuhan Utama', 'rows' => 5]) }}

					@if ($errors->has('kebutuhan'))
					<span class="help-block">
						<strong>{{ $errors->first('kebutuhan') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
				<label for="img" class="col-md-3 control-label">Image:</label>
				<div class="col-md-9">
					<input type="file" name="img" class="note-image-input form-control" placeholder="Thumbnail">
					@if ($errors->has('img'))
					<span class="help-block">
						<strong>{{ $errors->first('img') }}</strong>
					</span>
					@endif

					@if ($masjid->img)
					<br>
					<img src="/{{ $masjid->img }}" alt="" class="img-responsive" />
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="well">
			<h4 class="text-center">LOKASI</h4>
			<hr>
			<div class="form-group{{ $errors->has('provinsi_id') ? ' has-error' : '' }}">
				<div class="col-md-12">
					{{ Form::select('provinsi_id', \App\Lokasi::propinsi()->pluck('nama', 'id'), $masjid->provinsi_id, ['class' => 'form-control', 'placeholder' => '-- Provinsi --']) }}

					@if ($errors->has('provinsi_id'))
					<span class="help-block">
						<strong>{{ $errors->first('provinsi_id') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kota_id') ? ' has-error' : '' }}">
				<div class="col-md-12">
					{{ Form::select('kota_id', [], $masjid->kota_id, ['class' => 'form-control', 'placeholder' => '-- Kota --']) }}

					@if ($errors->has('kota_id'))
					<span class="help-block">
						<strong>{{ $errors->first('kota_id') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kecamatan_id') ? ' has-error' : '' }}">
				<div class="col-md-12">
					{{ Form::select('kecamatan_id', [], $masjid->kecamatan_id, ['class' => 'form-control', 'placeholder' => '-- Kecamatan --']) }}

					@if ($errors->has('kecamatan_id'))
					<span class="help-block">
						<strong>{{ $errors->first('kecamatan_id') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kelurahan_id') ? ' has-error' : '' }}">
				<div class="col-md-12">
					{{ Form::select('kelurahan_id', [], $masjid->kelurahan_id, ['class' => 'form-control', 'placeholder' => '-- Kelurahan --']) }}

					@if ($errors->has('kelurahan_id'))
					<span class="help-block">
						<strong>{{ $errors->first('kelurahan_id') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kode_pos') ? ' has-error' : '' }}">
				<div class="col-md-12">
					{{ Form::text('kode_pos', $masjid->kode_pos, ['class' => 'form-control', 'placeholder' => 'Kode Pos']) }}

					@if ($errors->has('kode_pos'))
					<span class="help-block">
						<strong>{{ $errors->first('kode_pos') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
				<div class="col-md-12">
					{{ Form::textarea('alamat', $masjid->alamat, ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => 3]) }}

					@if ($errors->has('alamat'))
					<span class="help-block">
						<strong>{{ $errors->first('alamat') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
				<div class="col-md-12">
					{{ Form::text('lat', $masjid->lat, ['class' => 'form-control', 'placeholder' => 'Latitude']) }}

					@if ($errors->has('lat'))
					<span class="help-block">
						<strong>{{ $errors->first('lat') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('long') ? ' has-error' : '' }}">
				<div class="col-md-12">
					{{ Form::text('long', $masjid->long, ['class' => 'form-control', 'placeholder' => 'Longitude']) }}

					@if ($errors->has('long'))
					<span class="help-block">
						<strong>{{ $errors->first('long') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<hr>

			<div class="form-group text-center">
				<button type="sumbit" name="save" class="btn btn-info">SAVE</button>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}

@push('script')

<script type="text/javascript">

	$('select').chosen();

	var getKota = function(propinsi) {
		$.ajax({
			url: '/lokasi?propinsi='+propinsi,
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
	};

	var getKecamatan = function(kota) {
		$.ajax({
			url: '/lokasi?kota='+kota,
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
	};

	var getKelurahan = function(kecamatan) {
		$.ajax({
			url: '/lokasi?kecamatan='+kecamatan,
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
	};

	@if ($masjid->id)
		// getKota($('[name=provinsi_id]').val());
		// getKecamatan($('[name=kota_id]').val());
		// getKelurahan($('[name=kecamatan_id]').val());
	@endif

	$('[name=provinsi_id]').change(function() {
		getKota(this.value);
	});

	$('[name=kota_id]').change(function() {
		getKecamatan(this.value);
	});

	$('[name=kecamatan_id]').change(function() {
		getKelurahan(this.value);
	});


</script>

@endpush
