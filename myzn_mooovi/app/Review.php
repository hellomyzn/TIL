<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['nickname', 'rate', 'review', 'product_id'];
}
