@extends('layouts.backend')

@section('content')

    <h3>ADD MENU</h3>
    <hr>

    @include('menu._form', ['url' => '/menu', 'method' => 'POST'])

@endsection
