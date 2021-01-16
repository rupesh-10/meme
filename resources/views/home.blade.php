@extends('layouts.app')

@section('content')
<div class="container pt-2">
    
@foreach($memes as $meme)
    <div class="row justify-content-center mt-4">
        <div class="col-md-7 col-sm-12">
            <div class="card">

                <div class="card-body">
                 <a class="text-dark text-decoration-none tex-body d-flex flex-row" href="{{ action("ProfileController@show",$meme->user->profile->id) }}">
                    <img src="{{ $meme->user->profile->profileImage() ?? asset("images/profile.png") }}" class="rounded-circle" width="70" height="70">
                    <h4 class="mt-4 ml-3">{{ $meme->user->name }} </h4>
                </a> 
                </div>
                <hr>

                <div class="card-body p-0 m-0">

                <div class="caption  pl-3 row">

                   <p class="col-md-9 col-sm-7">{{ $meme->caption }} </p>

                    <h6 class="text-secondary col-md-3 col-sm-3 text-center"><i class="fa fa-globe pr-1"></i><Strong>{{ $meme->postedAgo() }}</Strong></h6>
                </div>

                @if($meme->image)

                <div class="meme-media p-0 m-0">
                    <img src="{{ Storage::url($meme->image) }}" class="w-100" style="max-height:633px; max-width:633px;">
                </div>

                @endif

                <div class="text-center p-3 d-flex">
                  <a class="p-2 d-flex text-dark" href="{{ action("LikeDislikeController@like",$meme->id) }}">
                    <i class="@if($meme->liked()) text-danger fas fa-heart @else far fa-heart @endif  fa-2x"></i><span class="pl-2">{{ $meme->totalLikes() }}</span>
                  </a>
                   <a class="p-2 d-flex text-dark" data-toggle="collapse" href="#comment{{ $meme->id }}" role="button" aria-expanded="false" aria-controls="collapseExample"> <i class="far fa-comment fa-2x text-secondary"></i><span class="pl-2"> {{ count($meme->comments) }} </span>
                  <a class="p-2 d-flex text-dark" href="{{ action("LikeDislikeController@dislike",$meme->id) }}"> <i class="fa-2x @if($meme->disliked()) fas fa-thumbs-down text-primary @else far fa-thumbs-down text-dark @endif"></i><span class="pl-2">{{ $meme->totalDislikes() }}</span> </a>
                </div>
                <div class="collapse" id="comment{{ $meme->id }}">
                    <div class="card card-body">
                        <form action="{{ action('CommentController@store',$meme->id) }}" method="post">
                            @csrf
                        <input name="comment" id="comment" class="form-control rounded" placeholder="Write a comment" style="border-radius:20px;">
                        </form>
                    </div>

                    @if($meme->comments)
                    <h4 class="ml-4 mt-2">Comments: </h4>
                    @endif

                    @foreach($meme->comments as $comment)

                    <div class="m-3 px-2 pt-2" style="width:fit-content; max-width:100%; border-radius:20px;   
                    box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
                      transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);">

                        <div class="d-flex" style="">
                            <img class="rounded-circle" src="{{ $comment->commentator->profile->profileImage() }}" width="30" height="30">
                            <h6 class="pl-2 pt-1" style="font-weight: 800;">{{ $comment->commentator->name }}</h6>
                        </div>
                        <div class="ml-4 pl-1"> 
                           <span class="p-1" style="font-size:15px;"> {{ $comment->content }} </span>
                        </div>
                    </div>
                      <div class="d-flex ml-3 pl-2 pb-1">
                            <strong>{{ $comment->commentedAgo() }}</strong>
                                <a href="#" class="pl-2">like</a>
                                <a class="pl-2" href="#">Reply</a>
                        </div>
                  
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
 @endforeach
</div>
@section('js')
<script>

</script>
@endsection
@endsection