<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Meme extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'user_id',
        'image',
    ];

    public function like()
    {
        if ($this->liked()) {
            $this->likes()->where([['user_id',auth()->user()->id],['liked',1]])->delete();
        } else {
            $this->likeOrDislike(true);
        }
    }

    public function dislike()
    {
        if ($this->disliked()) {
            $this->likes()->where([['user_id',auth()->user()->id],['liked',0]])->delete();
        } else {
            $this->likeOrDislike(false);
        }
    }

    public function likeOrDislike($like)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => auth()->user()->id
            ],
            [
                'liked' => $like
            ]
        );
    }


    public function liked()
    {
        $liked = $this->likes()->where([['user_id',auth()->user()->id],['liked',1]])->first();
        if($liked){
            return true;
        }
        return false;
    }

    public function disliked()
    {
        $disliked = $this->likes()->where([['user_id',auth()->user()->id],['liked',0]])->first();
        if($disliked){
            return true;
        }
        return false;
    }

    public function totalLikes()
    {
        return $this->likes()->where('liked', true)->count();
    }


    public function totalDislikes()
    {
        return $this->likes()->where('liked', false)->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function postedAgo()
    {
        $ago = $this->created_at->shorterDiffForHumans();
        return  $ago;
    }
}
