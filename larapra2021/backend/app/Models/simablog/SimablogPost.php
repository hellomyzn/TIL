<?php

namespace App\Models\simablog;

use App\Models\simablog\SimablogUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimablogPost extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $with =['simablog_user'];

    public function simablog_user(){
        return $this->belongsTo(SimablogUser::class);
    }
}
