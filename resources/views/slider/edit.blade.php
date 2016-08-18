@extends('layouts.backend')

@section('content')

    <h3>EDIT SLIDER</h3>
    <hr>

    @include('slider._form', ['url' => '/slider/'.$slider->id, 'method' => 'PUT'])

@endsection
