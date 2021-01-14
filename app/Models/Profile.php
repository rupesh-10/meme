<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bio',
        'image',
    ];

    public function profileImage()
    {
        return $this->image ? Storage::url($this->image) : asset('images/profile.png');
    }

    public function connections()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
