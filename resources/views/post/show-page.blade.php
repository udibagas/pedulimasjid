@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div class="row">
    <div class="col-md-5 col-sm-5">
        @if ($post->img && file_exists($post->img))
        <br><br>
        <img src="/{{ $post->img }}" alt="{{ $post->title }}" class="img-responsive" />
        @endif
    </div>
    <div class="col-md-7 col-sm-7">
        <h2>{{ $post->title }}</h2>

        {!! $post->content !!}
    </div>
</div>

@endsection
