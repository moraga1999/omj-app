<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $session = session();
        $header = view('header');
        $footer = view('footer');
        return view('home', ['header' => $header, 'footer' => $footer]);
    }
}