@extends('layouts.app')

@section('title', 'Kirim Pesan')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h3>HUBUNGI KAMI</h3>
            <hr>
            <p>
                Untuk saran dan pertanyaan silakan hubungi kontak berikut atau isi form di samping.
            </p>

            <div class="well text-bold">
                Email : <a href="mailto:lontar.aditya@mail.com">lontar.aditya@mail.com</a><br>
                WA/SMS : 08568648757
            </div>
        </div>
        <div class="col-md-6">
            <h3>KIRIM PESAN</h3>
            <hr>
            @include('inbox._form', ['url' => '/inbox', 'method' => 'POST'])
        </div>
    </div>

@endsection
