@extends('layouts.app')

@section('title', 'Pesan')

@section('content')

    <div class="pull-right">
        <a href="/inbox/create" class="btn btn-brown">KIRIM PESAN</a>
    </div>

    <h3>PESAN</h3>
    <hr>

    @foreach ($inboxes as $i)
        @include('inbox._list', ['i' => $i])
    @endforeach

    <div class="text-center">
        {!! $inboxes->links() !!}
    </div>

@endsection
