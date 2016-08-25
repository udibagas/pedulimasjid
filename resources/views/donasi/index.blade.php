@extends('layouts.app')

@section('content')

    <h3>LAPORAN DONASI</h3>
    <hr>

    {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
    {!! Form::close() !!}

    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Donatur</th>
                <th>Jumlah</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donasis as $s)
            <tr>
                <td>{{ $s->tanggal }}</td>
                <td>{{ $s->donatur }}</td>
                <td>{{ $s->jumlah }}</td>
                <td>{{ $s->jenis }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right text-muted">{{ $donasis->total() }} items</div>

    <div class="text-center">
        {{ $donasis->appends(['q' => request('q')])->links() }}
    </div>

@endsection
