@extends('layouts.backend')

@section('content')

    <h3>MANAGE CATEGORIES</h3>
    <hr>

    {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        <a href="/category/create" class="btn btn-info">ADD CATEGORY</a>
        <div class="pull-right">
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        </div>
    {!! Form::close() !!}

    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Name</th>
                <th style="width:120px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $s)
            <tr>
                <td>
                    <a href="/category/{{ $s->id }}-{{ str_slug($s->name) }}">{{ $s->name }}</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'url' => '/category/'.$s->id]) !!}
                        <a href="/category/{{ $s->id }}/edit" class="btn btn-info btn-xs">EDIT</a>
                        <button type="submit" name="delete" class="btn btn-danger btn-xs confirm">DELETE</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right text-muted">{{ $categories->total() }} items</div>

    <div class="text-center">
        {{ $categories->appends(['q' => request('q')])->links() }}
    </div>

@endsection
