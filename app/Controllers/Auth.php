<?php namespace App\Controllers;

class Auth extends BaseController
{
    public function index(): string
    {
        $header = view('header');
        $footer = view('footer');
        return view('login', ['header' => $header, 'footer' => $footer]);
    }

    public function auth(): string
    {

    }
    
    public function logout(): string
    {
        $header = view('header');

    }
}