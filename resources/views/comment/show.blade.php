@extends('layouts.backend')

@section('content')

<h3>READ COMMENT</h3>
<hr>

@include('comment._list', ['c' => $comment])

@endsection
