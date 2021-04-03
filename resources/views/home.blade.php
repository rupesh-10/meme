@extends('layouts.app')

@section('content')
<div class="container pt-2">
<meme-component></meme-component>
</div>
@section('js')
<script src="{{ asset('js/meme/index.js') }}"></script>
<script>

    $(document).on('click','.edit',function(){
       let elm = $(this)
       $('.commentContent'+elm.data('id')).hide();
       $('.editComment'+elm.data('id')).show();
    })
    $(document).on("click",'.cancel',function(){
         let elm = $(this)
        $('.commentContent'+elm.data('id')).show();
        $('.editComment'+elm.data('id')).hide();
    })
</script>
@endsection
@endsection
