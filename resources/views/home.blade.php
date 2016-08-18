@extends('layouts.app')

@section('slider')
    @include('slider')
@endsection

@section('content')
<h2 class="text-center">KEGIATAN TERKINI</h2>
<hr style="border: 1px dashed #999;">

<div class="row">
    @foreach ($posts as $p)
        <div class="col-md-4 col-sm-6" style="margin-bottom:20px;">
            @include('post._list', ['p' => $p])
        </div>
    @endforeach
</div>

@endsection
