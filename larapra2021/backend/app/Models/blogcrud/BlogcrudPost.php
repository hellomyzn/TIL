<?php

namespace App\Models\blogcrud;

use App\Models\blogcrud\BlogcrudUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogcrudPost extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    protected $with =['blogcrud_user'];

    public function blogcrud_user(){
        return $this->belongsTo(BlogcrudUser::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }
}
