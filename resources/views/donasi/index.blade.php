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
            @include('donasi._table-jenis')
            @include('donasi._table-bulan')
            <!-- <div id="chart"></div> -->
            <!-- <div id="chartPerMonth"></div> -->
        </div>
    </div>

@endsection
