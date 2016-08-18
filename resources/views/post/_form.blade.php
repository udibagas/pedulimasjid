{!! Form::model($post, ['url' => $url, 'method' => $method, 'files' => true, 'class' => 'form-vertical']) !!}

<div class="row">
	<div class="col-md-9">
		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			{{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}

			@if ($errors->has('title'))
			<span class="help-block">
				<strong>{{ $errors->first('title') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
			{{ Form::textarea('content', $post->content, ['class' => 'form-control', 'placeholder' => 'Content']) }}

			@if ($errors->has('content'))
			<span class="help-block">
				<strong>{{ $errors->first('content') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
					<input type="file" name="img" class="note-image-input form-control" placeholder="Thumbnail">
					@if ($errors->has('img'))
					<span class="help-block">
						<strong>{{ $errors->first('img') }}</strong>
					</span>
					@endif

					@if ($post->img)
					<br>
					<img src="/{{ $post->img }}" alt="" class="img-responsive" />
					@endif
				</div>

				<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
					{{ Form::select('category_id', App\Category::pluck('name', 'id'), $post->category_id, ['class' => 'form-control', 'placeholder' => '-- Select Category --']) }}

					@if ($errors->has('category_id'))
					<span class="help-block">
						<strong>{{ $errors->first('category_id') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
					{{ Form::select('status', [0 => 'Draft', 1 => 'Published', 2 => 'Archived'], $post->status, ['class' => 'form-control', 'placeholder' => '-- Select Status --']) }}

					@if ($errors->has('status'))
					<span class="help-block">
						<strong>{{ $errors->first('status') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
					{{ Form::select('type', [0 => 'Post', 1 => 'Page'], $post->type, ['class' => 'form-control', 'placeholder' => '-- Select Type --']) }}

					@if ($errors->has('type'))
					<span class="help-block">
						<strong>{{ $errors->first('type') }}</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="panel-footer text-center">
				<button type="sumbit" name="save" class="btn btn-info">SAVE</button>
			</div>
		</div>
	</div>
</div>

<h3>POST GALLERY</h3>
<hr>

{!! Form::close() !!}
