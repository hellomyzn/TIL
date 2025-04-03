<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{    
    /**
     * show
     *
     * @return void
     */
    public function show()
    {
        return 'Hello';
    }
    
    /**
     * showId
     *
     * @param  mixed $id
     * @return void
     */
    public function showId($id)
    {
        return "Hello {$id}";
    }
}
