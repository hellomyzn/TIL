<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{

    public function getData(){
        return $this->id . ': ' . $this->name . ' (' . $this->age . ")";
    }

    public function scopeNameEqual($query, $str){
        return $query->where('name', $str);
    }

    public static function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public static function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }
}
