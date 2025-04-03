<?php

namespace App\Models\serviceRepositoryPattern;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRepositoryPatternPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
