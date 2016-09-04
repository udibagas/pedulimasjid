@extends('layouts.app')

@section('title', 'Konfirmasi Donasi')

@section('content')

    <h3>KONFIRMASI DONASI</h3>
    <hr>

    <div class="row">
        <div class="col-md-9">
            @include('donasi._form-konfirmasi', ['url' => '/simpan-konfirmasi', 'method' => 'POST'])
        </div>
    </div>


@endsection
