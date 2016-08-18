@extends('layouts.backend')

@section('content')

    <h3>EDIT MENU</h3>
    <hr>

    @include('menu._form', ['url' => '/menu/'.$menu->id, 'method' => 'PUT'])

@endsection
