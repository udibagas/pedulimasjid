<div class="well">
    <div class="pull-right">
        {!! Form::open(['method' => 'DELETE', 'url' => '/comment/'.$c->id]) !!}
            {!! Form::hidden('redirect', '/comment') !!}

            @if ($c->approved)
                <a href="/comment/{{ $c->id }}/unapprove?redirect={{ url()->full() }}" class="btn btn-default btn-sm" title="Unapprove"><i class="fa fa-remove"></i> Unapprove</a>
            @else
                <a href="/comment/{{ $c->id }}/approve?redirect={{ url()->full() }}" class="btn btn-default btn-sm" title="Approve"><i class="fa fa-check"></i> Approve</a>
            @endif

            <button type="submit" name="delete" class="btn btn-default btn-sm confirm" title="Delete"><i class="fa fa-trash"></i> Delete</button>
        {!! Form::close() !!}
    </div>

    <strong>
        {{ $c->name }} (<a href="mailto:{{ $c->email }}">{{ $c->email }}</a>)
    </strong><br>
    <span class="text-muted">{{ $c->created_at->diffForHumans() }}</span>

    <h4>{{ $c->title }}</h4>
    <p>{!! nl2br($c->content) !!}</p>
</div>
