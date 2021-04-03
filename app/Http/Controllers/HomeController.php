<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Meme;
use Carbon\Carbon;
use App\Models\Like;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getMemes(){
        $memes = Meme::all();
        $currentUser = auth()->user()->with('profile')->get();
        return response()->json(['memes'=>$memes,'user'=>$currentUser]);
    }
}
