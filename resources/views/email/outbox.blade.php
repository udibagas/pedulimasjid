<h3>{{ $inbox->subject }}</h3>
<p>{{ nl2br($inbox->body) }}</p>

<hr>

<p>{!! nl2br($outbox->body) !!}</p>
