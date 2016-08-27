@extends('layouts.app')

@section('title', 'Post')

@section('content')

<div class="row">
    @foreach ($posts as $p)
        <div class="col-md-4 col-sm-6" style="margin-bottom:20px;">
            @include('post._list', ['p' => $p])
        </div>
    @endforeach
</div>

<div class="text-center">
    {!! $posts->links() !!}
</div>

@endsection
