{{ $inbox->name }} (<a href="mailto:{{ $inbox->email }}">{{ $inbox->email }}</a>)

<br><br>

<h3>{{ $inbox->subject }}</h3>

<p>{{ nl2br($inbox->body) }}</p>
