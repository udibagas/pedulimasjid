@extends('layouts.backend')

@section('content')

    <div class="pull-right">
        {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
            <br>
            <a href="/masjid/create" class="btn btn-info"><i class="fa fa-plus"></i> ADD MASJID</a>
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        {!! Form::close() !!}
    </div>

    <h3>MANAGE MASJID</h3>
    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Nama</th>
                <th style="width:300px;">Alamat</th>
                <th>Lat/Long</th>
                <th>CP</th>
                <th>Kebutuhan Utama</th>
                <th>Kegiatan Rutin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masjids as $s)
            <tr>
                <td>
                    <a href="/masjid/{{ $s->id }}-{{ str_slug($s->nama) }}">{{ $s->nama }}</a>
                </td>
                <td>
                    {{ $s->alamat }}, Kelurahan {{ $s->kelurahan ? $s->kelurahan->nama : '-' }}, Kecamatan {{ $s->kecamatan ? $s->kecamatan->nama : '-' }}, {{ $s->kota ? $s->kota->nama : '-' }}, Provinsi {{ $s->provinsi ? $s->provinsi->nama : '-' }}, Kode Pos : {{ $s->kode_pos or '-' }}
                </td>
                <td>{{ $s->lat }}, {{ $s->long }}</td>
                <td>{{ $s->kontak_nama }} @if ($s->kontak_telp) <br />{{ $s->kontak_telp }} @endif</td>
                <td>{{ $s->kebutuhan }}</td>
                <td>{{ $s->kegiatan }}</td>
                <td class="text-right">
                    {!! Form::open(['method' => 'DELETE', 'url' => '/masjid/'.$s->id]) !!}
                        <a href="/masjid/{{ $s->id }}/edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                        <button type="submit" name="delete" class="btn btn-default btn-xs confirm"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right text-muted">{{ $masjids->total() }} items</div>

    <div class="text-center">
        {{ $masjids->appends(['q' => request('q')])->links() }}
    </div>

@endsection
