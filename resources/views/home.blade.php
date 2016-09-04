@extends('layouts.app')

@section('title', 'Home')

@section('slider')
    @include('slider')
@endsection

@section('content')

<div class="row text-center">
    <div class="col-md-3 col-sm-3">
        <a href="/masjid" class="menu-home">
            <i class="fa fa-list"></i> DAFTAR MASJID
        </a>
    </div>
    <div class="col-md-3 col-sm-3">
        <a href="/donasi" class="menu-home">
            <i class="fa fa-money"></i> LAPORAN DONASI
        </a>
    </div>
    <div class="col-md-3 col-sm-3">
        <a href="/konfirmasi-donasi" class="menu-home">
            <i class="fa fa-edit"></i> KONFIRMASI DONASI
        </a>
    </div>
    <div class="col-md-3 col-sm-3" class="menu-home">
        <a href="/hubungi-kami" class="menu-home">
            <i class="fa fa-envelope"></i> HUBUNGI KAMI
        </a>
    </div>
</div>

<br>
<br>

<div class="row">
    @foreach (\App\Category::orderBy('name', 'ASC')->get() as $c)
        @if ($c->posts()->ofType(\App\Post::TYPE_POST)->ofStatus(\App\Post::STATUS_PUBLISHED)->count())
        <div class="col-md-4 col-sm-6" style="margin-bottom:20px;">
            <div class="well">
                <h3>{{ $c->name }}</h3>
                <hr>
                @foreach ($c->posts()->latest()->ofStatus(\App\Post::STATUS_PUBLISHED)->ofType(\App\Post::TYPE_POST)->limit(3)->get() as $p)
                    @include('post._list', ['p' => $p])
                @endforeach
            </div>
        </div>
        @endif
    @endforeach
</div>

@endsection
