<?php

namespace App\Http\Controllers\Laracasts;

use App\Http\Controllers\Controller;
use App\Services\Laracasts\Newslatter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewslatterController extends Controller
{
    public function __invoke(Newslatter $newslatter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);
        
        try {
            (new Newslatter())->subscribe(request('email'));
        } catch (\Exception $e){
            throw ValidationException::withMessages([
                'email' => 'This email could not added to our newslatter list'
            ]);
        }
    
        return redirect('/laracasts/posts')
            ->with('success', 'You are now signed up for our newslatter');
    }
}
