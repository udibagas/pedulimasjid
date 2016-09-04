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

@if (session('success'))
    <div class="alert alert-success text-bold text-center">
        {{ session('success') }}
    </div>
@endif

<div class="well text-bold text-center">
    <p>
        Berikut adalah daftar masjid yang telah kami verifikasi dan membutuhkan bantuan. Untuk mendaftarkan masjid sebagai penerima bantuan silakan klik tombol di bawah ini.
    </p>
    <a href="/daftarkan-masjid" class="btn btn-brown"><i class="fa fa-edit"></i> DAFTARKAN MASJID</a>
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
