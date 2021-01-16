<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;

class LikeDislikeController extends Controller
{
    public function like($id)
    {
        $meme = Meme::findorFail($id);
        $meme->like();
        return redirect()->back();
    }

    public function dislike($id)
    {
        $meme = Meme::findorFail($id);
        $meme->dislike();
        return redirect()->back();
    }
}
