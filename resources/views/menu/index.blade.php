@extends('layouts.backend')

@section('content')

    <h3>MANAGE MENUS</h3>
    <hr>

    {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        <a href="/menu/create" class="btn btn-info">ADD MENU</a>
        <div class="pull-right">
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        </div>
    {!! Form::close() !!}

    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Label</th>
                <th>Link</th>
                <th>Placement</th>
                <th style="width:120px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $s)
            <tr>
                <td>{{ $s->label }}</td>
                <td><a href="{{ $s->link }}" target="_blank">{{ $s->link }}</a></td>
                <td>{{ $s->placement }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'url' => '/menu/'.$s->id]) !!}
                        <a href="/menu/{{ $s->id }}/edit" class="btn btn-info btn-xs">EDIT</a>
                        <button type="submit" name="delete" class="btn btn-danger btn-xs confirm">DELETE</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right text-muted">{{ $menus->total() }} items</div>

    <div class="text-center">
        {{ $menus->appends(['q' => request('q')])->links() }}
    </div>

@endsection
