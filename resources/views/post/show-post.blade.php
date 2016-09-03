@extends('layouts.app')

@section('title', $post->title)
@section('image', 'http://www.salwapedulimasj.id/'.$post->img)
@section('imageSquare', 'http://www.salwapedulimasj.id/'.$post->img)
@section('description', str_limit(strip_tags($post->content), 250))

@section('content')

    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h2>{{ $post->title }}</h2>
            <span class="text-muted">
                {{ $post->updated_at->diffForHumans() }} |
                <a href="/category/{{ $post->category_id }}">{{ $post->category->name }}</a>
            </span>

            @if ($post->img && file_exists($post->img))
                <br><br>
                <img src="/{{ $post->img }}" alt="{{ $post->title }}" class="img-responsive" />
            @endif

            <br><br>

            {!! $post->content !!}

            <br><br>

            @include('layouts._share')

            <br><br>

            <h3>KOMENTAR</h3>
            <hr>

            @if (session('success'))
            	<div class="alert alert-success text-bold text-center">
            		{{ session('success') }}
            	</div>
            @endif

            @each('comment._list', $post->comments()->when(auth()->guest(), function($q) {
                return $q->approved();
            })->get(), 'c')

            <div class="well">
                @include('comment._form', [
                    'comment' => new \App\Comment([
                        'commentable_id' => $post->id,
                        'commentable_type' => 'post'
                    ])
                ])
            </div>

            <h3>POST TERKAIT</h3>
            <hr>
            <div class="row">
                @foreach ($related as $p)
                <div class="col-md-6" style="margin-bottom:20px;">
                    @include('post._list', ['p' => $p])
                </div>
                @endforeach
            </div>

        </div>
        <div class="col-md-4 col-sm-4 hidden-xs">
            <div class="well">
                @foreach (\App\Post::ofType(\App\Post::TYPE_POST)->ofStatus(\App\Post::STATUS_PUBLISHED)->limit(5)->latest()->get() as $p)
                @include('post._list', ['p' => $p])
                @endforeach
                <hr>
                <a href="/post" class="text-center"><h4>MORE</h4></a>
            </div>
        </div>

    </div>

@endsection
