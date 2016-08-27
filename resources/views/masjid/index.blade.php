@extends('layouts.app')

@section('title', 'Masjid')

@section('content')

<div class="pull-right">
{!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
{!! Form::close() !!}
</div>

<h3>DAFTAR MASJID</h3>
<hr>

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
