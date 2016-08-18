@extends('layouts.backend')

@section('content')

    <h3>EDIT CATEGORY</h3>
    <hr>

    @include('category._form', ['url' => '/category/'.$category->id, 'method' => 'PUT'])

@endsection
