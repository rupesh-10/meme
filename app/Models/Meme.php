<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'user_id',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postedAgo()
    {
        $ago = Carbon::today()->diffInDays(Carbon::parse($this->created_at->toDateString()));
        if ($ago == 0) {
            return "Today";
        } elseif ($ago == 1) {
            return "Yesterday";
        }
        return  $ago . " days ago";
    }
}
