<?php

namespace App\Models\simplenote;

use App\Models\simplenote\SimplenoteUser;
use App\Models\simplenote\SimplenoteTag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimplenoteMemo extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with =['simplenote_user'];

    public function simplenote_user(){
        return $this->belongsTo(SimplenoteUser::class);
    }

    public function simplenote_tag(){
        return $this->belongsTo(SimplenoteTag::class);
    }
}
