@extends('layouts.backend')

@section('content')

    <h3>EDIT POST</h3>
    <hr>

    @include('post._form', ['url' => '/post/'.$post->id, 'method' => 'PUT'])

@endsection
