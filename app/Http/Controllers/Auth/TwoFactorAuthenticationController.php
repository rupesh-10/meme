<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\TwoFactorCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TwoFactorAuthenticationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','twofactor']);
    }

    public function index(){
        return view('auth.twofactor.verify');
    }

    public function store(Request $request){
        $request->validate([
            'two_factor_code' => 'required|integer',
        ]);

        $user = auth()->user();
        if($request->input('two_factor_code') == $user->two_factor_code){
            $user->resetTwoFactorCode();
            return redirect()->route('feeds');
        }
        return redirect()->back()->withErrors(['two_factor_code'=>'The two factor code you have entered does not match']);
    }

    public function resend(){
        $user = auth()->user();
        $user->generateTwoFactorCode();
        Mail::to($user->email)->send(new TwoFactorCode($user->two_factor_code));

        return redirect()->back()->withMessage('The two factor code has been resent to your email');
    }


}
