@extends('layouts.backend')

@section('content')

    <h3>ADD SLIDER</h3>
    <hr>

    @include('slider._form', ['url' => '/slider', 'method' => 'POST'])

@endsection
