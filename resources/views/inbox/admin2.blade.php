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

    @each('inbox._list', $inboxes, 'i')

    <div class="pull-right text-muted">{{ $inboxes->total() }} items</div>

    <div class="text-center">
        {{ $inboxes->appends(['q' => request('q')])->links() }}
    </div>

@endsection
