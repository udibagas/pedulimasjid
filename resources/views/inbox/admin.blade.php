@extends('layouts.backend')

@section('content')

    <div class="pull-right">
        {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
            <br>
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        {!! Form::close() !!}
    </div>

    <h3>MANAGE INBOX</h3>
    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Sender</th>
                <th>Body</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inboxes as $s)
            <tr class="@if ($s->status == \App\Inbox::STATUS_UNREAD) text-bold @endif">
                <td><a href="/inbox/{{ $s->id }}-{{ str_slug($s->subject) }}">{{ $s->subject }}</a></td>
                <td>
                    {{ $s->name }}
                    <br><a href="mailto:{{ $s->email }}">{{ $s->email }}</a>
                </td>
                <td>{{ str_limit($s->body, 100) }}</td>
                <td>{{ $s->created_at->diffForHumans() }}</td>
                <td class="text-right">
                    {!! Form::open(['method' => 'DELETE', 'url' => '/inbox/'.$s->id]) !!}
                        @if ($s->status != \App\Inbox::STATUS_REPLIED)
                        <a href="/outbox/create?inbox_id={{ $s->id }}" class="btn btn-default btn-xs" title="Reply"><i class="fa fa-reply"></i></a>
                        @endif
                        <!-- <a href="/inbox/{{ $s->id }}/edit" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-edit"></i></a> -->
                        <button type="submit" name="delete" class="btn btn-default btn-xs confirm" title="Delete"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right text-muted">{{ $inboxes->total() }} items</div>

    <div class="text-center">
        {{ $inboxes->appends(['q' => request('q')])->links() }}
    </div>

@endsection
