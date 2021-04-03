<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;

class LikeDislikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($id)
    {
        $meme = Meme::findorFail($id);
        $meme->like();
        return response()->json(['message'=>"Liked Successfully!"]);
    }

    public function dislike($id)
    {
        $meme = Meme::findorFail($id);
        $meme->dislike();
        return response()->json(['message'=>"Hmm You disliked it!"]);
    }
}
