@extends('layouts.layout')
@section('title', 'CMS-IMAGES')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">All Images</h1>
            @foreach($images as $image)
                <figure class="col-md-6">
                    <img src=" {{asset('storage/' . $image->path )}}"
                         alt=""
                         class="img-thumbnail">
                </figure>
            @endforeach
        </div>
    </div>

@endsection