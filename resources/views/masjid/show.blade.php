@extends('layouts.app')

@section('title', 'Masjid : '.$masjid->nama)

@section('content')

    <h2>{{ $masjid->nama }}</h2>
    <hr>

    <div class="row">
        <div class="col-md-4">
            @if ($masjid->img)
                <img src="/{{ $masjid->img }}" alt="{{ $masjid->nama }}" class="img-responsive" />
            @endif
        </div>
        <div class="col-md-8">
            <div class="">
                <table class="table table-hover table-bordered table-striped table-condensed">
                    <tbody>
                        <tr>
                            <td class="td-label">Nama Masjid</td>
                            <td>{{ $masjid->nama }}</td>
                        </tr>
                        <tr>
                            <td class="td-label">Alamat</td>
                            <td>
                                {{ $masjid->alamat }}, Kelurahan {{ $masjid->kelurahan ? $masjid->kelurahan->nama : '-' }}, Kecamatan {{ $masjid->kecamatan ? $masjid->kecamatan->nama : '-' }}, {{ $masjid->kota ? $masjid->kota->nama : '-' }}, Provinsi {{ $masjid->provinsi ? $masjid->provinsi->nama : '-' }}, Kode Pos : {{ $masjid->kode_pos or '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">Lat/Long</td>
                            <td>
                                <a href="#" title="Lihat di Google Map">
                                    {{ $masjid->lat }}/{{ $masjid->long }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">Contact Person</td>
                            <td>{{ $masjid->kontak_nama }} - {{ $masjid->kontak_telp }}</td>
                        </tr>
                        <tr>
                            <td class="td-label">Kegiatan Rutin</td>
                            <td>{{ $masjid->kegiatan }}</td>
                        </tr>
                        <tr>
                            <td class="td-label">Kebutuhan Utama</td>
                            <td>{{ $masjid->kebutuhan }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
