@extends('layouts.backend')

@section('content')

    <h3>MANAGE DONASI</h3>
    <hr>

    {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        <a href="/donasi/create" class="btn btn-info">ADD DONASI</a>
        <div class="pull-right">
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        </div>
    {!! Form::close() !!}

    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Donatur</th>
                <th>Jumlah</th>
                <th>Jenis</th>
                <th style="width:120px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donasis as $s)
            <tr>
                <td>{{ $s->tanggal }}</td>
                <td>{{ $s->donatur }}</td>
                <td>{{ $s->jumlah }}</td>
                <td>{{ $s->jenis }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'url' => '/donasi/'.$s->id]) !!}
                        <a href="/donasi/{{ $s->id }}/edit" class="btn btn-info btn-xs">EDIT</a>
                        <button type="submit" name="delete" class="btn btn-danger btn-xs confirm">DELETE</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right text-muted">{{ $donasis->total() }} items</div>

    <div class="text-center">
        {{ $donasis->appends(['q' => request('q')])->links() }}
    </div>

@endsection
