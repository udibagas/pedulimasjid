@extends('layouts.app')

@section('title', 'Masjid')

@section('content')

<div class="pull-right hidden-xs">
{!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
{!! Form::close() !!}
</div>

<h3>DAFTAR MASJID</h3>
@include('layouts._share')
<hr>

<div class="well text-bold text-center">
    Berikut adalah daftar masjid yang telah kami verifikasi dan membutuhkan bantuan.
</div>

<div class="hidden-md hidden-sm hidden-lg hidden-xl">
{!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
{!! Form::close() !!}
<br>
</div>

<div class="row">
    @foreach ($masjids as $m)
        <div class="col-md-4 col-sm-6" style="margin-bottom:20px;">
            @include('masjid._list', ['m' => $m])
        </div>
    @endforeach
</div>

<div class="text-center">
    {!! $masjids->links() !!}
</div>

@endsection
