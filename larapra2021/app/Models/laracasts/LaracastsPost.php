<?php

namespace App\Models\laracasts;

use App\Models\laracasts\LaracastsCategory;
use App\Models\laracasts\LaracastsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaracastsPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with =['laracasts_category', 'laracasts_user'];

    public function laracasts_category(){
        return $this->belongsTo(LaracastsCategory::class);
    }

    public function laracasts_user(){
        return $this->belongsTo(LaracastsUser::class);
    }

    public static function scopeFilter($query, array $filters){
        
        $query->when($filters['search'] ?? false, fn ($query, $search) =>  
            $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%'));
        
        $query->when($filters['category'] ?? false, fn ($query, $category) =>  
            $query->whereHas('laracasts_category', fn($query) => 
                $query->where('slug', $category)
            )
        );

        $query->when($filters['user'] ?? false, fn ($query, $user) =>  
        $query->whereHas('laracasts_user', fn($query) => 
            $query->where('username', $user)
        )
    );    

    }
}
