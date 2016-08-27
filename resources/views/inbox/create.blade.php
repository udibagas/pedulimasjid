@extends('layouts.app')

@section('title', 'Kirim Pesan')

@section('content')

    <div class="row">
        <div class="col-md-4 text-center">
            <i class="fa fa-envelope" style="font-size:200px;margin-top:100px;color:#8E4E4E;"></i>
        </div>
        <div class="col-md-8">
            <h3>KIRIM PESAN</h3>
            <hr>
            @include('inbox._form', ['url' => '/inbox', 'method' => 'POST'])
        </div>
    </div>

@endsection
