<?php

namespace App\Http\Controllers;

class PageController extends Controller {
    public function getIndex(){
        return view('pages.welcome');
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
