<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'img_url',
        'description',
        'user_id',
    ];

    protected $appends = [
        'like_id',
        'is_like',
    ];

    public function getLikeIdAttribute()
    {
        return Like::buildQueryByUserIdAndPostId(Auth::user()->id, $this->id)->pluck('id');
    }

    public function getIsLikeAttribute()
    {
        return Like::buildQueryByUserIdAndPostId(Auth::user()->id, $this->id)->exists();
    }


    // relation

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'post_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like', 'post_id', 'id');
    }
}
