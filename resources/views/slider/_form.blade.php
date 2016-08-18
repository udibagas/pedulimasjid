{!! Form::model($slider, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-horizontal']) !!}

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	<label for="title" class="col-md-2 control-label">Title :</label>
	<div class="col-md-10">
		{{ Form::text('title', $slider->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}

		@if ($errors->has('title'))
		<span class="help-block">
			<strong>{{ $errors->first('title') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
	<label for="content" class="col-md-2 control-label">Content :</label>
	<div class="col-md-10">
		{{ Form::textarea('content', $slider->content, ['class' => 'form-control', 'placeholder' => 'Content']) }}

		@if ($errors->has('content'))
		<span class="help-block">
			<strong>{{ $errors->first('content') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
	<label for="img" class="col-md-2 control-label">Image :</label>
	<div class="col-md-10">
		<input type="file" name="img" class="note-image-input form-control">
		@if ($errors->has('img'))
		<span class="help-block">
			<strong>{{ $errors->first('img') }}</strong>
		</span>
		@endif

		@if ($slider->img)
		<br>
		<img src="/{{ $slider->img }}" alt="" />
		@endif
	</div>
</div>

<div class="form-group">
	<label for="active" class="col-md-2 control-label">Status :</label>
	<div class="col-md-10">
		{{ Form::select('active', [0 => 'Nonactive', 1 => 'Active'], $slider->active, ['class' => 'form-control']) }}
	</div>
</div>

<hr>

<div class="form-group">
	<div class="col-md-10 col-md-offset-2">
		<button type="sumbit" name="save" class="btn btn-info">SAVE</button>
	</div>
</div>


{!! Form::close() !!}
