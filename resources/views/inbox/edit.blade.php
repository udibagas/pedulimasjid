@extends('layouts.backend')

@section('content')

    <h3>EDIT MESSAGE</h3>
    <hr>

    @include('inbox._form', ['url' => '/inbox/'.$inbox->id, 'method' => 'PUT'])

@endsection
