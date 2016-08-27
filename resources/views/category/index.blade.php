@extends('layouts.backend')

@section('content')

    <div class="pull-right">
        {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
            <br>
            <a href="/category/create" class="btn btn-info"><i class="fa fa-plus"></i> ADD CATEGORY</a>
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        {!! Form::close() !!}
    </div>

    <h3>MANAGE CATEGORIES</h3>
    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
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
                        <a href="/category/{{ $s->id }}/edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                        <button type="submit" name="delete" class="btn btn-default btn-xs confirm"><i class="fa fa-trash"></i></button>
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
