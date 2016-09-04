@extends('layouts.backend')

@section('content')

    <div class="pull-right">
        {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
            <br>
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        {!! Form::close() !!}
    </div>

    <h3>MANAGE COMMENTS</h3>
    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Sender</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th style="width:60px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $s)
            <tr class="@if ($s->approved == 0) danger @endif">
                <td>
                    {{ $s->name }}
                    <br><a href="mailto:{{ $s->email }}">{{ $s->email }}</a>
                </td>
                <td><a href="/comment/{{ $s->id }}-{{ str_slug($s->title) }}">{{ $s->title }}</a></td>
                <td>{{ str_limit($s->content, 100) }}</td>
                <td>{{ $s->created_at->diffForHumans() }}</td>
                <td class="text-right">
                    {!! Form::open(['method' => 'DELETE', 'url' => '/comment/'.$s->id]) !!}
                        {!! Form::hidden('redirect', '/comment') !!}

                        @if ($s->approved)
                            <a href="/comment/{{ $s->id }}/unapprove?redirect={{ url()->full() }}" class="btn btn-default btn-xs confirm" title="Unapprove"><i class="fa fa-remove"></i></a>
                        @else
                            <a href="/comment/{{ $s->id }}/approve?redirect={{ url()->full() }}" class="btn btn-default btn-xs confirm" title="Approve"><i class="fa fa-check"></i></a>
                        @endif

                        <button type="submit" name="delete" class="btn btn-default btn-xs confirm" title="Delete"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right text-muted">{{ $comments->total() }} items</div>

    <div class="text-center">
        {{ $comments->appends(['q' => request('q')])->links() }}
    </div>

@endsection
