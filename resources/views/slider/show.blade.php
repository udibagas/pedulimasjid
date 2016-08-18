@extends('layouts.app')

@section('content')

    <h3>{{ $post->title }}</h3>
    <span class="text-muted">{{ $post->updated_at->diffForHumans() }}</span>

    <img src="/uploads/{{ $post->img }}" alt="{{ $post->title }}" class="img-responsive" />

    {!! $post->content !!}

@endsection
