{{ $comment->name }} (<a href="mailto:{{ $comment->email }}">{{ $comment->email }}</a>)

<br><br>

<h3>{{ $comment->title }}</h3>

<p>{!! nl2br($comment->content) !!}</p>
