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
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at',
        'two_factor_expires_at',
        'two_factor_code'
    ];

    protected $dates = [
        'two_factor_expires_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at',
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

    public function generateTwoFactorCode(){
        $this->timestamps = false;
        $this->two_factor_code = rand(100000,999999);
        $this->two_factor_expires_at = now()->addMinute(15);
        $this->save();

    }

    public function resetTwoFactorCode(){
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
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
