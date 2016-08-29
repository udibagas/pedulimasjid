@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h2>{{ $post->title }}</h2>
            <span class="text-muted">{{ $post->updated_at->diffForHumans() }}</span>

            @if ($post->img && file_exists($post->img))
            <div class="" style="width:100%;height:300px;margin-top:20px;">
                <img src="/{{ $post->img }}" alt="{{ $post->title }}" class="cover" />
            </div>
            @endif

            <br><br>

            {!! $post->content !!}

            <br><br>

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
            <ul class="list-group">
                @foreach (\App\Post::ofType(\App\Post::TYPE_POST)->ofStatus(\App\Post::STATUS_PUBLISHED)->limit(5)->latest()->get() as $p)
                <li class="list-group-item">
                    @include('post._list', ['p' => $p])
                </li>
                @endforeach
                <li class="list-group-item text-center">
                    <a href="/post"><h4>MORE</h4></a>
                </li>
            </ul>
        </div>

    </div>

@endsection
