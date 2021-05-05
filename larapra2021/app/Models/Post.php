<?php

namespace App\Models;

class Post {
    public static function find($slug){
        $path = resource_path("posts/$slug.html");

        if (! file_exists($path)) {
            logger("laracasts/post/$slug page is not exist");
            // ddd("hoge");
            abort(404);
        }

        $post = cache()->remember("posts.$slug", noW()->addMinutes(20), function() use ($path){
            return file_get_contents($path);
        });

        return $post;

    }

}