{!! Form::model($comment, ['method' => 'POST', 'url' => '/comment']) !!}

    {!! Form::hidden('commentable_id', $comment->commentable_id) !!}
    {!! Form::hidden('commentable_type', $comment->commentable_type) !!}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    	{{ Form::text('name', $comment->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}

    	@if ($errors->has('name'))
    	<span class="help-block">
    		<strong>{{ $errors->first('name') }}</strong>
    	</span>
    	@endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    	{{ Form::text('email', $comment->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}

    	@if ($errors->has('email'))
    	<span class="help-block">
    		<strong>{{ $errors->first('email') }}</strong>
    	</span>
    	@endif
    </div>

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    	{{ Form::text('title', $comment->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}

    	@if ($errors->has('title'))
    	<span class="help-block">
    		<strong>{{ $errors->first('title') }}</strong>
    	</span>
    	@endif
    </div>

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    	{{ Form::textarea('content', $comment->content, ['class' => 'form-control', 'placeholder' => 'Content', 'rows' => 6]) }}

    	@if ($errors->has('content'))
    	<span class="help-block">
    		<strong>{{ $errors->first('content') }}</strong>
    	</span>
    	@endif
    </div>

    <div class="form-group">
    	<button type="sumbit" name="save" class="btn btn-brown">KIRIM KOMENTAR</button>
    </div>

{!! Form::close() !!}
