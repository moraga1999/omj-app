<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $header = view('header');
        return view('home', ['header' => $header]);
    }
}