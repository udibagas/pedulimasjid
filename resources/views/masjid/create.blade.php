@extends('layouts.app')

@section('content')

    <h3>DAFTARKAN MASJID</h3>
    <hr>

    <div class="well text-bold text-center">
        Silakan isi form berikut untuk mendaftarkan masjid sebagai penerima bantuan. Data terlebih dahulu akan kami verifikasi sebelum tampil di halaman <a href="/masjid">Daftar Masjid</a>.
    </div>

    @include('masjid._form', ['url' => '/masjid', 'method' => 'POST'])

@endsection
