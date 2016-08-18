@extends('layouts.backend')

@section('content')

    <h3>MANAGE POSTS</h3>
    <hr>

    {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        <a href="/post/create" class="btn btn-info">ADD POST</a>
        <div class="pull-right">
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        </div>
    {!! Form::close() !!}

    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Type</th>
                <th>Status</th>
                <th>Last Update</th>
                <th style="width:120px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $s)
            <tr>
                <td>
                    <a href="/post/{{ $s->id }}-{{ str_slug($s->title ) }}" target="_blank">
                        {{ $s->title }}
                    </a>
                </td>
                <td>{{ $s->category ? $s->category->name : '' }}</td>
                <td>{{ $s->type ? 'Page' : 'Post' }}</td>
                <td>
                    {{ $s->status == 0 ? 'Draft' : $s->status == 1 ? 'Published' : 'Archived' }}
                </td>
                <td>{{ $s->updated_at->diffForHumans() }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'url' => '/post/'.$s->id]) !!}
                        <a href="/post/{{ $s->id }}/edit" class="btn btn-info btn-xs">EDIT</a>
                        <button type="submit" name="delete" class="btn btn-danger btn-xs confirm">DELETE</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right text-muted">{{ $posts->total() }} items</div>

    <div class="text-center">
        {!! $posts->appends(['q' => request('q')])->links() !!}
    </div>

@endsection
