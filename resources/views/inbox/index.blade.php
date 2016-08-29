@extends('layouts.app')

@section('title', 'Pesan')

@section('content')

    <h3>HUBUNGI KAMI</h3>
    <hr>

    <div class="row">
        <div class="col-md-7">
            @each('inbox._list', $inboxes, 'i')

            <div class="text-center">
                {!! $inboxes->links() !!}
            </div>
        </div>
        <div class="col-md-5">
            <p>
                Untuk saran dan pertanyaan silakan hubungi kontak berikut atau isi form di bawah ini.
            </p>

            <div class="well text-bold">
                Email : <a href="mailto:admin@salwapedulimasj.id">admin@salwapedulimasj.id</a><br>
                WA/SMS : 08568648757
            </div>

            <div class="well">
                @include('inbox._form', ['url' => '/inbox', 'method' => 'POST'])
            </div>
        </div>
    </div>

@endsection
