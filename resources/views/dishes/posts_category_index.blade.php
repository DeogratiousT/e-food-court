@extends('layouts.app')

@section('content')
<h2 class="ml-3 mb-3 text-capitalize">{{ $category }} Posts</h2>
<div class="card-columns">
    @foreach ($publishedPosts as $post)
        <div class="col mb-4">
            <div class="card h-100">
            <div class="ribbon ribbon-top-left">
                <span><b>{{ $post->category->name }}</b></span>
            </div>
            <img src="{{ env('AWS_URL') }}/cover images/{{ $post->cover_image }}" class="card-img-top img-fluid rounded" style="max-width: 280px; height:280px">
                <div class="card-body">
                    <a href="{{ route('posts.show',$post) }}" class="card-title">{{ $post->title }}</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Updated at: {{ $post->updated_at }}</small>
                </div>
            </div>
        </div> 
    @endforeach      
</div>
@endsection