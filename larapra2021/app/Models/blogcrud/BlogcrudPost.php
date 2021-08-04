<?php

namespace App\Models\blogcrud;

use App\Models\blogcrud\BlogcrudUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogcrudPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with =['laracasts_user'];

    public function laracasts_user(){
        return $this->belongsTo(BlogcrudUser::class);
    }
}
