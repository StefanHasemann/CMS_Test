@extends('layouts.layout')
@section('title', 'CMS-Images')
@section('content')
    <div class="row">

    <form method="POST" action="/images/" class="col-md-12" enctype="multipart/form-data">
        @csrf
            <div class="form-group col-md-6 pl-0 pt-2">
                <label for="title" class="col-form-label">Titel</label>
                <input type="text"
                       name="title"
                       class="{{$errors->has('title') ? 'border-danger' : '' }} form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group col-md-6 pl-0">
                <label for="description" c >Description</label>
                        <textarea name="description"
                                  placeholder="Project description"
                                  class="{{ $errors->has('description') ? 'border-danger' : '' }} form-control">{{ old('description') }}
                        </textarea>
            </div>
            <div class="form-group">
                <label for="path" class="col-form-label">Image</label>
                <div class="col-md-4 p-0 align-baseline">
                    <input type="file" name="path"
                           class="{{$errors->has('title') ? 'border-danger' : '' }} btn">
                </div>
                <figure class="col-md-8 float-right">
                    <img src="https://via.placeholder.com/150" alt="">
                </figure>
            </div>

            <div class="form-group col-md-6 pl-0">
                <button class="form-control btn btn-primary" type="submit">Create project</button>
                @include('errors')
            </div>
    </form>
    </div>


@endsection