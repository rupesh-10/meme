<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'meme_id',
        'liked',
    ];

    public function meme()
    {
        return $this->belongsTo(Meme::class);
    }
}
