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

        return view("pages.about")->with('fullname', $full);
    }

    public function getContact(){
        return view('pages.contact');
    }
}
