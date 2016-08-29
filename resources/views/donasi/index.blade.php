@extends('layouts.app')

@section('title', 'Donasi')

@section('content')

    <h3>LAPORAN DONASI</h3>
    <hr>

    <div class="row">
        <div class="col-md-9">
            <p>
                Berikut adalah laporan donasi realtime (terakhir kali diupdate pada {{ \App\Donasi::latest()->first()->updated_at }}) . Donasi dapat disalurkan ke rekening berikut:

                <div class="well text-bold">
                    Bank : Muamalat <br>
                    Atas Nama : Lontar Aditya Nugroho<br>
                    Nomor Rekening : 3090002187
                </div>

            </p>

            @include('donasi._table')
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div class="well well-sm">
                <h3 class="text-center">SUMMARY</h3>
                <hr>
                @include('donasi._table-jenis')
                @include('donasi._table-bulan')
                <!-- <div id="chart"></div> -->
                <!-- <div id="chartPerMonth"></div> -->
            </div>
        </div>
    </div>

@endsection
