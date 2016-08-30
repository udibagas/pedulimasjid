{!! Form::model($menu, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-horizontal']) !!}

<div class="well">
	<div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
		<label for="link" class="col-md-2 control-label">Link :</label>
		<div class="col-md-5">
			{{ Form::select('link1', \App\Menu::getMenuList(), $menu->link, ['class' => 'form-control', 'placeholder' => '- Link -']) }}

			@if ($errors->has('link'))
			<span class="help-block">
				<strong>{{ $errors->first('link') }}</strong>
			</span>
			@endif
		</div>
		<div class="col-md-5">
			{{ Form::text('link', $menu->link, ['class' => 'form-control', 'placeholder' => 'Link']) }}

			@if ($errors->has('link'))
			<span class="help-block">
				<strong>{{ $errors->first('link') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
		<label for="label" class="col-md-2 control-label">Label :</label>
		<div class="col-md-10">
			{{ Form::text('label', $menu->label, ['class' => 'form-control', 'placeholder' => 'Label']) }}

			@if ($errors->has('label'))
			<span class="help-block">
				<strong>{{ $errors->first('label') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('placement') ? ' has-error' : '' }}">
		<label for="placement" class="col-md-2 control-label">Placement :</label>
		<div class="col-md-10">
			{{ Form::select('placement', \App\Menu::getPlacementList(), $menu->placement, ['class' => 'form-control', 'placeholder' => '- Placement -']) }}

			@if ($errors->has('placement'))
			<span class="help-block">
				<strong>{{ $errors->first('placement') }}</strong>
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

@push('script')

<script type="text/javascript">
	$('[name=link1]').change(function() {
		$('[name=link]').val(this.value);
	});
</script>

@endpush
