<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create();
        });
    }

    public function connected()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function memes()
    {
        return $this->hasMany(Meme::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likeDislikeRatio()
    {
        $totalLikes = 0;
        $totalDislikes = 0;
        $memes = $this->memes()->get();

        foreach ($memes as $meme) {
            $totalLikes += $meme->totalLikes();
            $totalDislikes += $meme->totalDislikes();
        }

        if ($totalDislikes == 0) {
            return $totalLikes;
        }

        return round($totalLikes / $totalDislikes, 2);
    }
}
