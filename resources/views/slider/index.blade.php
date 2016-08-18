@extends('layouts.backend')

@section('content')

    <h3>MANAGE SLIDERS</h3>
    <hr>

    {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        <a href="/slider/create" class="btn btn-info">ADD SLIDER</a>
        <div class="pull-right">
            {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
        </div>
    {!! Form::close() !!}

    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <!-- <th style="width:200px;">Image</th> -->
                <th style="width:200px;">Title</th>
                <!-- <th>Content</th> -->
                <th>Active</th>
                <th>Last Update</th>
                <th style="width:130px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $s)
            <tr>
                <!-- <td> <img src="/{{ $s->img }}" alt="" class="img-responsive" /> </td> -->
                <td>{{ $s->title }}</td>
                <!-- <td>{{ $s->content }}</td> -->
                <td>{{ $s->active ? 'Yes' : 'No' }}</td>
                <td>{{ $s->updated_at->diffForHumans() }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'url' => '/slider/'.$s->id]) !!}
                        <a href="/slider/{{ $s->id }}/edit" class="btn btn-info btn-xs">EDIT</a>
                        <button type="submit" name="delete" class="btn btn-danger btn-xs confirm">DELETE</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right text-muted">{{ $sliders->total() }} items</div>

    <div class="text-center">
        {!! $sliders->appends(['q' => request('q')])->links() !!}
    </div>

@endsection
