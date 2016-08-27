@extends('layouts.app')

@section('title', 'Donasi')

@section('content')

    <h3>LAPORAN DONASI</h3>
    <hr>

    <div class="row">
        <div class="col-md-7">
            @include('donasi._table')
        </div>

        <div class="col-md-5">
            chart will be here
        </div>
    </div>

@endsection
