<?php

namespace App\Models\laracasts;


use App\Models\laracasts\LaracastsPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaracastsCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function laracasts_posts(){
        return $this->hasMany(LaracastsPost::class);
    }
}
