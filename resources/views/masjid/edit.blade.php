@extends('layouts.backend')

@section('content')

    <h3>EDIT MASJID</h3>
    <hr>

    @include('masjid._form', ['url' => '/masjid/'.$masjid->id, 'method' => 'PUT'])

@endsection
