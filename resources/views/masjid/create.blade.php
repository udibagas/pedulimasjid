@extends('layouts.backend')

@section('content')

    <h3>ADD MASJID</h3>
    <hr>

    @include('masjid._form', ['url' => '/masjid', 'method' => 'POST'])

@endsection
