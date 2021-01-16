<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'commentator_id',
        'meme_id',
        'content',
        'image',
    ];

    public function meme()
    {
        return $this->belongsTo(Meme::class);
    }

    public function commentator()
    {
        return $this->belongsTo(User::class);
    }

    public function commentedAgo()
    {
        return $this->created_at->shorterDiffForHumans();
    }
}
