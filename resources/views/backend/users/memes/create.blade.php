@extends('layouts.app')
@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h4>Create Post</h4>
                    </div>
                    <div class="text-left">
                        <div class="d-flex">
                            <img src="{{ auth()->check() ? auth()->user()->profile->profileImage() : asset("images/profile.png") }}" width="50" height="50" class="rounded-circle">
                            <h4 class="m-2 pt-1 pl-2">{{ auth()->user()->name ?? "Anonymous" }}</h4>
                        </div>
                    </div>
                    <form action="{{  action("User\MemeController@store") }}" method="post"  enctype="multipart/form-data">
                        @csrf
                    <div class="row mt-2">
                          <div class="col-md-12">
                               <textarea class="form-control-lg w-100 @error('caption') is-invalid @enderror " placeholder="What's On Your Mind?" style="height: 100px;" name="caption"></textarea>
                             @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="image-input text-center">
                                <input type="file"  id="imageInput" name="image" class="@error('image') is-invalid @enderror">
                                <label for="imageInput" class="image-button image-label"><i class="far fa-image image-icon"></i> Choose image</label>
                                <img src="" class="image-preview" width="400" height="400" style="display:none;">
                                <span class="change-image" style="font-size:18px; color:red;">Choose different image</span>
                            </div>
                              @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    </div>
                    <div class="row">
                        <button class="btn btn-success ml-3" style="width: 95%;">Post</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
