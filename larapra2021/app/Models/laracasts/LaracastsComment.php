<?php

namespace App\Models\laracasts;

use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaracastsComment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with =['laracasts_user'];

    public function laracasts_post(){
        return $this->belongsTo(LaracastsPost::class);
    }

    public function laracasts_user(){
        return $this->belongsTo(LaracastsUser::class);
    }
}
