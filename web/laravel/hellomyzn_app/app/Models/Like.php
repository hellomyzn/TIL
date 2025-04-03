<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;


class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userID
     * @param int $postID
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeBuildQueryByUserIdAndPostId($query, int $userID, int $postID)
    {
        return $query->where('user_id', $userID)->where('post_id', $postID);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }
}
