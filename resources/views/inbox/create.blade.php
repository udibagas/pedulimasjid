@extends('layouts.app')

@section('title', 'Kirim Pesan')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <!-- <i class="fa fa-envelope" style="font-size:200px;margin-top:100px;color:#8E4E4E;"></i> -->
            <h3>HUBUNGI KAMI</h3>
            <hr>
            <p>
                Untuk saran dan pertanyaan silakan hubungi kontak berikut atau isi form di samping.
            </p>

            <div class="well text-bold">
                Email : <a href="mailto:admin@salwapedulimasj.id">admin@salwapedulimasj.id</a><br>
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
