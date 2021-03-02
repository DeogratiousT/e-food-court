
    @isset($publishedPosts)
        @foreach($publishedPosts as $publishedPost)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <a href="/posts/{{$publishedPost->id}}" class="text-center d-block mb-4">
                            <img src="storage/cover images/{{ $publishedPost->cover_image }}" class="img-fluid" style="max-width: 280px;" alt="{{ $publishedPost->name }} Image" title="{{ $publishedPost->name }} Image"/>
                        </a>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h4><a href="/posts/{{$publishedPost->id}}">{{$publishedPost->title}}</a></h4>
                        <small>Written on {{$publishedPost->created_at}} by {{$publishedPost->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$publishedPosts->links()}}
    @else
    <p>No Posts Found</p>     
    @endisset

