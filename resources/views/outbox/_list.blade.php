<div class="alert alert-info">
    <strong>ADMIN</strong><br>
    <span class="text-muted">{{ $o->created_at->diffForHumans() }}</span>
    <br><br>

    <p> {!! nl2br($o->body) !!} </p>
</div>