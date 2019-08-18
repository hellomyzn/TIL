<?php

namespace App\Http\Validators;

use Illuminate\Validators;

class HelloValidator extends Validator
{
    public function validateHello($attribute, $value, $paramenters)
    {
        return $value % 2 == 0;
    }
}
