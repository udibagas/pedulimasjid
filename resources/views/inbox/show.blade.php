@extends('layouts.backend')

@section('content')

    <h3>READ INBOX</h3>
    <hr>

    @include('inbox._list', ['i' => $inbox])

@endsection
