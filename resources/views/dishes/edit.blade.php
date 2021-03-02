@extends('layouts.app')

@section('content')
<form action="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Title</label>
        <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" id="title" name="title" value="{{ $post->title }}" required>
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('title') }}
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="description">Body</label>
        <textarea class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" name="body">{{ $post->body }}</textarea>
        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('body') }}
            </span>
        @endif

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'body', {
                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        </script>

    </div>

    <div class="form-group">
        <label for="images">Cover Image</label>
        {{-- <br>
            <div class="flex-column p-3">
                <img src="storage/cover images/{{ $post->cover_image }}" alt="{{ $post->name }}" style="height: 100px">
            </div> --}}
        <input class="form-control {{ $errors->has('cover_image') ? ' is-invalid' : '' }}" type="file" id="cover_image" name="cover_image">
        @if ($errors->has('cover_image'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('cover_image') }}
            </span>
        @endif
    </div>

    <div class="form-group mb-0 text-center">
        <button class="btn btn-primary btn-block" type="submit">
            <i class="mdi mdi-content-save"></i> Submit
        </button>
    </div>
</form>
@endsection