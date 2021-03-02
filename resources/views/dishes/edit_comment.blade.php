@extends('layouts.app')

@section('content')
<form action="{{ route('posts.comments.update',[$post,$comment]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="content">Edit Comment</label>
        <textarea class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" name="content">{{ $comment->content }}</textarea>
        @if ($errors->has('content'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('content') }}
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