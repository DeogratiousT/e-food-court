<div style="float:right">
    <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="mdi mdi-plus-circle"></i> Create Post</a>
</div>
<div class="clearfix"></div>
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-published-tab" data-toggle="tab" href="#nav-published" role="tab" aria-controls="nav-published" aria-selected="true">Published</a>
        <a class="nav-item nav-link" id="nav-unpublished-tab" data-toggle="tab" href="#nav-unpublished" role="tab" aria-controls="nav-unpublished" aria-selected="false">Un-Published <span class="badge badge-primary badge-pill">{{ count($unPublishedPosts) }}</span></a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <!--Published posts-->
    <div class="pt-3 tab-pane fade show active" id="nav-published" role="tabpanel" aria-labelledby="nav-published-tab">
        @isset($publishedPosts)
            @foreach($publishedPosts as $publishedPost)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <a href="/posts/{{$publishedPost->id}}" class="text-center d-block mb-4">
                                <img src="storage/cover images/{{ $publishedPost->cover_image }}" class="img-fluid" style="max-width: 280px;" alt="{{ $publishedPost->title }} Image" title="{{ $publishedPost->title }} Image"/>
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
    </div>
    <!--End Published posts-->
        
    <!--Un-Published posts-->
    <div class="pt-3 tab-pane fade" id="nav-unpublished" role="tabpanel" aria-labelledby="nav-unpublished-tab">
        @isset($unPublishedPosts)
            @foreach($unPublishedPosts as $unPublishedPost)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <a href="/posts/{{$unPublishedPost->id}}" class="text-center d-block mb-4">
                                <img src="storage/cover images/{{ $unPublishedPost->cover_image }}" class="img-fluid" style="max-width: 280px;" alt="{{ $unPublishedPost->title }} Image" title="{{ $unPublishedPost->title }} Image"/>
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h4><a href="/posts/{{$unPublishedPost->id}}">{{$unPublishedPost->title}}</a></h4>
                            <small>Written on {{$unPublishedPost->created_at}} by {{$unPublishedPost->user->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No un-published Posts Found</p> 
        @endisset
    </div>
    <!--End Un-Published posts-->
</div>