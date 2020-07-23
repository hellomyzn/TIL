<?php

namespace App\Http\Controllers;

use App\Post;

class PageController extends Controller {
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){

        $first = 'Alex';
        $last = 'Curtis';

        $full = $first . " " . $last;
        $email = 'eiji@eiji.com';

        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $full;

        return view("pages.about")->withData($data);
    }

    public function getContact(){
        return view('pages.contact');
    }
}
