@extends('layouts.backend')

@section('content')

    <h3>EDIT DONASI</h3>
    <hr>

    @include('donasi._form', ['url' => '/donasi/'.$donasi->id, 'method' => 'PUT'])

@endsection
