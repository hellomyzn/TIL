<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'image_url', 'director', 'detail', 'open_date'];

    public function reviews()
    {
      return $this->hasMany(Review::class);
    }
}
