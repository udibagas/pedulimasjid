@extends('layouts.backend')

@section('content')

    <h3>ADD DONASI</h3>
    <hr>

    @include('donasi._form', ['url' => '/donasi', 'method' => 'POST'])

@endsection
