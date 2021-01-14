@extends('layouts.app')

@section('content')
<div class="container">
    
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
                   <p class="col-md-9 col-sm-7">{{ $meme->caption }}
                    </p>
                    <h6 class="text-secondary col-md-3 col-sm-3 text-center"><i class="fa fa-globe pr-1"></i><Strong>{{ $meme->postedAgo() }}</Strong></h6>
                </div>
                @if($meme->image)
                <div class="meme-media p-0 m-0">
                    <img src="{{ Storage::url($meme->image) }}" class="w-100" style="max-height:633px; max-width:633px;">
                </div>
                @endif
                <div class="text-center p-3 d-flex">
                    <a class="p-2 d-flex text-dark" href="#"> <i class="fas fa-heart fa-2x text-danger"></i> <span class="pl-2"> 1k</span> </a>
                   <a class="p-2 d-flex text-dark" href="#"> <i class="far fa-comment fa-2x text-secondary"></i><span class="pl-2"> 2k </span> </a>
                  <a class="p-2 d-flex text-dark" href="#"> <i class="far fa-thumbs-down fa-2x text-primary"></i><span class="pl-2"> 1k</span> </a>
                </div>
                </div>
            </div>
        </div>
    </div>
 @endforeach
</div>
@endsection
