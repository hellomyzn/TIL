<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {

    public static function all()
    {
        $files = File::files(resource_path("posts/"));

        return array_map(function ($file){
            return $file->getContents();
        }, $files);
    }


    public static function find($slug){
        $path = resource_path("posts/$slug.html");

        if (! file_exists($path)) {
            logger("laracasts/post/$slug page is not exist");
            // ddd("hoge");
            // abort(404);
            throw new ModelNotFoundException();
        }

        $post = cache()->remember("posts.$slug", noW()->addMinutes(20), function() use ($path){
            return file_get_contents($path);
        });

        return $post;

    }

}