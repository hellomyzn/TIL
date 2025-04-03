<?php

namespace App\Models\simplenote;

use App\Models\simplenote\SimplenoteUser;
use App\Models\simplenote\SimplenoteMemo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimplenoteTag extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with =['simplenote_user'];

    public function simplenote_user(){
        return $this->belongsTo(SimplenoteUser::class);
    }
    public function simplenote_memos(){
        return $this->hasMany(SimplenoteMemo::class);
    }
}
