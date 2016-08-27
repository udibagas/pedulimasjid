@extends('layouts.backend')

@section('content')

<h3>BALAS PESAN</h3>
<hr>

@include('inbox._list', ['i' => $inbox])

@include('outbox._form', ['url' => '/outbox', 'method' => 'POST'])

@endsection
