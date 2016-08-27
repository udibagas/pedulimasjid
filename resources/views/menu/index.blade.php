@extends('layouts.backend')

@section('content')

    <div class="pull-right">
        {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
            <br>
            <a href="/menu/create" class="btn btn-info"><i class="fa fa-plus"></i> ADD MENU</a>
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        {!! Form::close() !!}
    </div>

    <h3>MANAGE MENUS</h3>
    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Label</th>
                <th>Link</th>
                <th>Placement</th>
                <th>Action</th>
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
                        <a href="/menu/{{ $s->id }}/edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                        <button type="submit" name="delete" class="btn btn-default btn-xs confirm"><i class="fa fa-trash"></i></button>
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
