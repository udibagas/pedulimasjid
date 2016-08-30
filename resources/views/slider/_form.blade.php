{!! Form::model($slider, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-vertical']) !!}

<div class="row">
	<div class="col-md-9">
		<div class="well">
			<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				{{ Form::text('title', $slider->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}

				@if ($errors->has('title'))
				<span class="help-block">
					<strong>{{ $errors->first('title') }}</strong>
				</span>
				@endif
			</div>

			<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
				{{ Form::textarea('content', $slider->content, ['class' => 'form-control summernote', 'placeholder' => 'Content']) }}

				@if ($errors->has('content'))
				<span class="help-block">
					<strong>{{ $errors->first('content') }}</strong>
				</span>
				@endif
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="well text-center">
			<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
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

			<div class="form-group">
				{{ Form::select('active', [0 => 'Nonactive', 1 => 'Active'], $slider->active, ['class' => 'form-control']) }}
			</div>
			<hr>
			<button type="sumbit" name="save" class="btn btn-info">SAVE</button>
		</div>
	</div>
</div>


{!! Form::close() !!}
