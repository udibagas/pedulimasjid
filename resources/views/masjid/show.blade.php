@extends('layouts.app')

@section('title', 'Masjid : '.$masjid->nama)
@section('image', 'http://www.salwapedulimasj.id/'.$masjid->img)
@section('imageSquare', 'http://www.salwapedulimasj.id/'.$masjid->img)
@section('description', str_limit(strip_tags($masjid->kegiatan), 250))

@section('content')

    <h2>{{ $masjid->nama }}</h2>
    @include('layouts._share')
    <hr>

    <div class="row">
        <div class="col-md-7 col-sm-7">
            <div class="well">
                <table class="table table-no-border table-condensed">
                    <tbody>
                        <tr>
                            <td class="td-label">Nama Masjid :</td>
                            <td>{{ $masjid->nama }}</td>
                        </tr>
                        <tr>
                            <td class="td-label">Alamat :</td>
                            <td>
                                {{ $masjid->alamat }}, Kelurahan {{ $masjid->kelurahan ? $masjid->kelurahan->nama : '-' }}, Kecamatan {{ $masjid->kecamatan ? $masjid->kecamatan->nama : '-' }}, {{ $masjid->kota ? $masjid->kota->nama : '-' }}, Provinsi {{ $masjid->provinsi ? $masjid->provinsi->nama : '-' }}, Kode Pos {{ $masjid->kode_pos or '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">Lat/Long :</td>
                            <td>
                                <a href="https://www.google.co.id/maps/{{ '@'.$masjid->lat }},{{ $masjid->long }},15.75z?hl=en" title="Lihat di Google Map" target="_blank">
                                    {{ $masjid->lat }}/{{ $masjid->long }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">Contact Person :</td>
                            <td>{{ $masjid->kontak_nama }} - {{ $masjid->kontak_telp }}</td>
                        </tr>
                        <tr>
                            <td class="td-label">Kondisi Saat Ini :</td>
                            <td>{!! nl2br($masjid->kondisi) !!}</td>
                        </tr>
                        <tr>
                            <td class="td-label">Kegiatan Rutin :</td>
                            <td>{!! nl2br($masjid->kegiatan) !!}</td>
                        </tr>
                        <tr>
                            <td class="td-label">Kebutuhan Utama :</td>
                            <td>{!! nl2br($masjid->kebutuhan) !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3>KOMENTAR</h3>
            <hr>

            @if (session('success'))
            	<div class="alert alert-success text-bold text-center">
            		{{ session('success') }}
            	</div>
            @endif

            @each('comment._list', $masjid->comments()->when(auth()->guest(), function($q) {
                return $q->approved();
            })->get(), 'c')

            <div class="well">
                @include('comment._form', [
                    'comment' => new \App\Comment([
                        'commentable_id' => $masjid->id,
                        'commentable_type' => 'masjid'
                    ])
                ])
            </div>

        </div>

        <div class="col-md-5 col-sm-5">
            @if ($masjid->img)
                <img src="/{{ $masjid->img }}" alt="{{ $masjid->nama }}" class="img-responsive" style="width:100%" />
            @endif
        </div>
    </div>

@endsection
