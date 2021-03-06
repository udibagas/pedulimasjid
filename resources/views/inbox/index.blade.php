@extends('layouts.app')

@section('title', 'Pesan')

@section('content')

    <h3>HUBUNGI KAMI</h3>
    @include('layouts._share')
    <hr>

    <div class="row">
        <div class="col-md-7">
            @each('inbox._list', $inboxes, 'i')

            <div class="text-center">
                {!! $inboxes->links() !!}
            </div>
        </div>
        <div class="col-md-5">
            <div class="well">
                <p>
                    Untuk saran dan pertanyaan silakan hubungi kontak berikut atau isi form di bawah ini.
                </p>
                <div class="text-bold">
                    Email : <a href="mailto:lontar.aditya@mail.com">lontar.aditya@mail.com</a><br>
                    WA/SMS : 08568648757
                </div>

                <br>

                @include('inbox._form', ['url' => '/inbox', 'method' => 'POST'])
            </div>
        </div>
    </div>

@endsection
