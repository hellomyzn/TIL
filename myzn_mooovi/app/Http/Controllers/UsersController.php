<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show()
    {
        $disk = Storage::disk('s3');
        $files = $disk->files('/images/avatar');
        return view('users.show', ['files' => $files]);

    }
}
