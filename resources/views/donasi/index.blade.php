@extends('layouts.app')

@section('title', 'Donasi')

@section('content')

    <h3>LAPORAN DONASI</h3>
    @include('layouts._share')
    <hr>

    <div class="row">
        <div class="col-md-9">
            
            @if (session('success'))
            	<div class="alert alert-success text-bold text-center">
            		{{ session('success') }}
            	</div>
            @endif

            <div class="well">
                Berikut adalah laporan donasi realtime (terakhir kali diupdate pada {{ \App\Donasi::latest()->first()->updated_at }}) . Donasi dapat disalurkan ke rekening berikut:

                <br> <br>

                <div class="text-bold">
                    Bank : Muamalat <br>
                    Atas Nama : Lontar Aditya Nugroho<br>
                    Nomor Rekening : 3090002187
                </div>

                <br>

                Jika Anda telah melakukan transfer silakan konfirmasi dengan cara klik tombol berikut: <br><br>

                <a href="/konfirmasi-donasi" class="btn btn-brown">Konfirmasi Donasi</a>
            </div>
            @include('donasi._table')
        </div>

        <div class="col-md-3">
            @include('donasi._table-jenis')
            @include('donasi._table-bulan')
            <!-- <div id="chart"></div> -->
            <!-- <div id="chartPerMonth"></div> -->
        </div>
    </div>

@endsection
