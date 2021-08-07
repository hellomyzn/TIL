<?php

namespace App\Models\simplenote;

use App\Models\simplenote\SimplenoteUser;
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
}
