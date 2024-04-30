<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $session = session();
        $header = view('header');
        //Home tiene footer unico
        return view('home', ['header' => $header]);
    }

    public function mi_tarjeta(): string
    {
        $session = session();
        $header = view('header');
        $footer = view('footer');
        return view('mi_tarjeta', ['header' => $header, 'footer' => $footer]);
    }

    public function mis_beneficios(): string
    {
        $session = session();
        $header = view('header');
        $footer = view('footer');
        return view('mis_beneficios', ['header' => $header, 'footer' => $footer]);
    }
}