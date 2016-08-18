@extends('layouts.backend')

@section('content')

    <h3>CREATE NEW POST</h3>
    <hr>

    @include('post._form', ['url' => '/post', 'method' => 'POST'])

@endsection
