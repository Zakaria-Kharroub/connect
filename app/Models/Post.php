<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Database\Eloquent\Concerns\HasEvents;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'image',
        'user_id'
    ];




    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
       return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByUser(User $user)
    {

    return $this->likes()->where('user_id', $user->id)->exists();
    }
}
