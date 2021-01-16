<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $meme = Meme::findorFail($id);
        $user = auth()->user();
        $request->validate([
            'comment' => 'required',
        ]);

        if ($request->has('image')) {
            $imagePath = $request['image']->store('comment_images', 'public');
        }

        Comment::create([
            'meme_id' => $meme->id,
            'commentator_id' => $user->id,
            'content' => $request['comment'],
            'images' => $imagePath ?? '',

        ]);

        return redirect()->back();
    }
}
