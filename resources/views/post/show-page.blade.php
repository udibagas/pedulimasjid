@extends('layouts.app')

@section('title', $post->title)
@section('image', 'http://www.salwapedulimasj.id/'.$post->img)
@section('imageSquare', 'http://www.salwapedulimasj.id/'.$post->img)
@section('description', str_limit(strip_tags($post->content), 250))

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

        <br><br>

        @include('layouts._share')
    </div>
</div>

@endsection
