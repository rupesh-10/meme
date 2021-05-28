<?php
namespace App\Repositories;

use App\Interfaces\MemeRepositoryInterface;
use App\Models\Meme;

class MemeRepository implements MemeRepositoryInterface {
    public function all(){
          return Meme::with(['user','comments.commentator'])->take(5)->get()->map(function($meme){
            return [
                'id' => $meme->id,
                'caption' => $meme->caption,
                'image' => $meme->image,
                'country' => $meme->country,
                'category' => $meme->category,
                'postedAgo' => $meme->postedAgo(),
                'user' => $meme->user,
                'comments' => $meme->comments,
                'liked' => $meme->liked(),
                'disliked' => $meme->disliked(),
                'totalLikes' => $meme->totalLikes(),
                'totalDislikes' => $meme->totalDislikes(),
            ];
        });
    }
}
