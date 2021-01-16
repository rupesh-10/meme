@extends('layouts.app')
@section('css')
<style>
// ----- Personal preference -----
*, *:before, *:after {
  box-sizing: border-box;
}

// ----- Variable Declarations -----
@keyframes spin {
    from {transform:rotate(0deg);}
    to {transform:rotate(360deg);}
}

// ----- Styles -----
body, html {
  min-height: 100vh;
  background: #666;
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
  font-weight: 300;
}
.table {
  display: table;
}
.table-cell {
  display: table-cell;
  vertical-align: middle;
}
.modal {
  width: 300px;
  margin: 0 auto;
  background: #fff;
  box-shadow: 0 40px 50px rgba(black, 0.35);
  padding: 40px;
  position:  relative !important;
  overflow: visible !important;
}
#mediaFile {
  position: absolute;
  top: -1000px;
}
#profile {
  border-radius: 100%;
  width: 200px;
  height: 200px;
  margin: 0 auto;
  position: relative;
  top: -80px;
  margin-bottom: -80px;
  cursor: pointer;
  background: #f4f4f4;
  display: table;
  background-size: cover;
  background-position: center center;
  box-shadow: 0 5px 8px rgba(black, 0.35);
  .dashes {
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 100%;
    width: 100%;
    height: 100%;
    border: 4px dashed #ddd;
    opacity: 1;
  }
  label {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
    padding: 0 30px;
    color: grey;
    opacity: 1;
  }
  &.dragging {
    background-image: none!important;
    .dashes {
      animation-duration: 10s;
      animation-name: spin;
      animation-iteration-count:infinite;
      animation-timing-function: linear;
      opacity: 1!important;
    }
    label {
      opacity: 0.5!important;
    }
  }
  &.hasImage {
    .dashes, label {
      opacity: 0;
      pointer-events: none;
      user-select: none;
    }
  }
}
h1 {
  text-align: center;
  font-size: 28px;
  font-weight: normal;
  letter-spacing: 1px;
}
.stat {
  width: 50%;
  text-align: center;
  float: left;
  padding-top: 20px;
  border-top: 1px solid #ddd;
  .label {
    font-size: 11px;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase
  }
  .num {
    font-size: 21px;
    padding: 3px 0;
  }
}
.editable {
  position: relative;
  i {
    position: absolute;
    top: 10px;
    right: -20px;
    opacity: 0.3
  }
}
button {
  width: 100%;
  -webkit-appearance: none;
  line-height: 40px;
  color: #fff;
  border: none;
  background-color: #ea4c89;
  margin-top: 30px;
  font-size: 13px;
  -webkit-font-smoothing: antialiased;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase
}
// ----- Mobile styles -----
@media only screen 
  and (max-device-width: 736px) { 
}
</style>
@endsection
@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card pt-3">
                <div class="card-body">
                <div class="table mt-4">
                <div class="table-cell">
                    <div class="modal show" style="display: block !important;">
                    <div id="profile" class="hasImage" style="background:url('{{$profile->profileImage() }}'); background-size:cover; background-position:center center">
                        <div class="dashes"></div>
                        {{-- <label>Click to browse or drag an image here</label> --}}
                      </div>
                    <div class="no-editable pl-2 pt-2" ><h1 >{{ $profile->user->name }}</h1></div>
                    </div>
                </div>
                </div>
                    <form action="{{  action("ProfileController@update",$profile->id) }}" method="post"  enctype="multipart/form-data">
                      @method('put')
                        @csrf
                <input type="file" id="mediaFile" name="image">
                    <div class="row mt-2">
                          <div class="col-md-12">
                               <textarea class="form-control-lg w-100 @error('bio') is-invalid @enderror " placeholder="Add Bio.." style="height: 100px;" name="bio">{{ $profile->bio??" " }}</textarea>
                             @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                    </div>
                    <div class="row">
                    <button>Done Editing</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
// ----- On render -----
$(function() {

  $('#profile').addClass('dragging').removeClass('dragging');
});

$('#profile').on('dragover', function() {
  $('#profile').addClass('dragging')
}).on('dragleave', function() {
  $('#profile').removeClass('dragging')
}).on('drop', function(e) {
  $('#profile').removeClass('dragging hasImage');

  if (e.originalEvent) {
    var file = e.originalEvent.dataTransfer.files[0];
    console.log(file);

    var reader = new FileReader();

    //attach event handlers here...

    reader.readAsDataURL(file);
    reader.onload = function(e) {
      console.log(reader.result);
      $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');

    }

  }
})
$('#profile').on('click', function(e) {
  console.log('clicked')
  $('#mediaFile').click();
});
window.addEventListener("dragover", function(e) {
  e = e || event;
  e.preventDefault();
}, false);
window.addEventListener("drop", function(e) {
  e = e || event;
  e.preventDefault();
}, false);
$('#mediaFile').change(function(e) {

  var input = e.target;
  if (input.files && input.files[0]) {
    var file = input.files[0];

    var reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = function(e) {
      console.log(reader.result);
      $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
    }
  }
})
</script>
@endsection