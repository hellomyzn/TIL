<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class Hellovalidator extends Validator
{
    public function validateHello($attribute, $value, $parameters)
    {
        return $value % 2 == 0;
    }
}
