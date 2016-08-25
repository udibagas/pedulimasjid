@extends('layouts.backend')

@section('content')

    <h3>MANAGE MASJID</h3>
    <hr>

    {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        <a href="/masjid/create" class="btn btn-info">ADD MASJID</a>
        <div class="pull-right">
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        </div>
    {!! Form::close() !!}

    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>CP</th>
                <th>Kebutuhan Utama</th>
                <th>Kegiatan Rutin</th>
                <th style="width:120px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masjids as $s)
            <tr>
                <td>
                    <a href="/masjid/{{ $s->id }}-{{ str_slug($s->nama) }}">{{ $s->nama }}</a>
                </td>
                <td>{{ $s->alamat }}</td>
                <td>{{ $s->kontak_nama }} @if ($s->kontak_telp) {{ $s->kontak_telp }} @endif</td>
                <td>{{ $s->kebutuhan }}</td>
                <td>{{ $s->kegiatan }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'url' => '/masjid/'.$s->id]) !!}
                        <a href="/masjid/{{ $s->id }}/edit" class="btn btn-info btn-xs">EDIT</a>
                        <button type="submit" name="delete" class="btn btn-danger btn-xs confirm">DELETE</button>
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
