<div class="well">
    @if (auth()->check())
        <div class="pull-right">
            {!! Form::open(['method' => 'DELETE', 'url' => '/inbox/'.$i->id]) !!}
                @if ($i->status != \App\Inbox::STATUS_REPLIED)
                <a href="/outbox/create?inbox_id={{ $i->id }}" title="Reply" class="btn btn-default btn-sm">
                    <i class="fa fa-reply"></i> REPLY
                </a>
                @endif
                <button type="submit" name="delete" class="btn btn-default btn-sm confirm" title="Delete"><i class="fa fa-trash"></i> DELETE</button>
            {!! Form::close() !!}
        </div>
    @endif

    <strong>
        {{ $i->name }} (<a href="mailto:{{ $i->email }}">{{ $i->email }}</a>)
    </strong><br>
    <span class="text-muted">{{ $i->created_at->diffForHumans() }}</span>

    <h4>{{ $i->subject }}</h4>
    <p> {!! nl2br($i->body) !!} </p>

    @if ($i->outbox)
        <br>
        @include('outbox._list', ['o' => $i->outbox])
    @endif
</div>
