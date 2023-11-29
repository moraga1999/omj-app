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
    public function acerca_de(): string
    {
        $session = session();
        $header = view('header');
        $footer = view('footer');
        return view('nosotros', ['header' => $header, 'footer' => $footer]);
    }
    public function servicios(): string
    {
        $session = session();
        $header = view('header');
        $footer = view('footer');
        return view('servicios', ['header' => $header, 'footer' => $footer]);
    }
}