<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function connect($id)
    {
        $user = User::find($id);
        $currentUser = User::findorFail(auth()->user()->id);
        return $currentUser->connected()->toggle($user->profile->id) && $currentUser->profile->connections()->toggle($user->id);
    }
}
