@extends('layouts.app')

@section('title', $category->name)

@section('content')

    <h2>{{ $category->name }}</h2>
    <hr>

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
