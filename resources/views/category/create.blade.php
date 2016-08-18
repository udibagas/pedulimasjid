@extends('layouts.backend')

@section('content')

    <h3>ADD CATEGORY</h3>
    <hr>

    @include('category._form', ['url' => '/category', 'method' => 'POST'])

@endsection
