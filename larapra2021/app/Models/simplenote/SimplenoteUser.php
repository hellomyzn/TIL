<?php

namespace App\Models\simplenote;

use App\Models\User;
use App\Models\simplenote\SimplenoteMemo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimplenoteUser extends Model
{
    use HasFactory;
       
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function simplenote_memos(){
        return $this->hasMany(SimplenoteMemo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
