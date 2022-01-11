<?php

namespace App\Services\Laracasts;

interface Newslatter
{
    public function subscribe(string $email, string $list = null);
}