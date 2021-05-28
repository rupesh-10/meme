@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Two Factor Authentication') }}</div>

                <div class="card-body">
                    @if(session()->has('message'))
                    <p class="alert alert-info">
                        {{ session()->get('message') }}
                    </p>
                    @endif

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verify.store') }}">
                        @csrf
                        <div class="col-12">
                            <label class="label">Please Enter Code</label>
                            <input class="form-control {{ $errors->has('two_factor_code') ? 'is_invalid' : '' }}"  placeholder="" name="two_factor_code">
                            @error('two_factor_code')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                            <button class="btn btn-success mt-3 mb-2">Verify Now</button>
                        </div>
                    </form>

                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verify.resend') }}">
                        @csrf
                        <button  type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
