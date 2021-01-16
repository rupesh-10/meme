@extends("layouts.app")
@section('css')
<style>
@media only screen 
  and (max-device-width: 736px) { 
      .profile-head{
          justify-content:center;
          text-align: center;
      }
      .profile-name .row, .d-flex{
          text-align: center;
          justify-content: center;
      }

}
</style>
@endsection
@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="profile-head row pb-2">
            <div class="col-md-4">
                <img src="{{ $profile->profileImage() }}" width="150" height="150" class="rounded-circle">
            </div>
                <div class="profile-name pl-3 col-md-8 pt-3">
                    <div class="row">
                    <div class="col-md-8 d-flex align-item-center">
                    <h4 >{{ $profile->user->name }}</h4>
                    @can('connect',$profile)
                    <connect-component user-id="{{$profile->user->id}}" connection="{{ $connection }}"></connect-component>
                    @endcan
                    </div> 
                    <div class="col-md-4">
                    @can('update',$profile)
                    <a class="text-primary" href="{{ action("ProfileController@edit",$profile->id) }}">Edit Profile</a>
                    @endcan
                    </div>
                    <p class="pl-3 pt-2">{{$profile->bio}} </p>
                    </div>
                    <div class="d-flex"  style="">
                        <span class="pl-2"> <strong>{{ count($profile->user->memes) }}</strong> Memes </span>
                        <span class="pl-2"> <strong>{{ count($profile->user->connected) }}</strong> Connection </span>
                        <span class="pl-2"> <strong>{{ $profile->user->likeDislikeRatio() }}</strong> L/D </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="userMemes">
                <div class="row">
                    @foreach($profile->user->memes as $meme)
                    @if($meme->image)
                    <div class="col-md-4 mt-3">
                        <div class="media">
                            <img src="{{ Storage::url($meme->image) }}" width="100%">
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection