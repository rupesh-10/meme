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
            $this->liked()->delete();
        } else {
            $this->likeOrDislike(true);
        }
    }

    public function dislike()
    {
        if ($this->disliked()) {
            $this->disliked()->delete();
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
        return $this->likes()->where([['user_id', auth()->user()->id], ['liked', true]])->first();
    }

    public function disliked()
    {
        return $this->likes()->where([['user_id', auth()->user()->id], ['liked', false]])->first();
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
