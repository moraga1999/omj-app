<?php

namespace App\Controllers;
use App\Models\SocioModel;
use CodeIgniter\HTTP\RedirectResponse;

class SocioTarjeta extends BaseController
{
    public function index(): string
    {
        $session = session();
        $usuarioData = $session->get('usuario');
        $header = view('header');
        if ($usuarioData) {
            $model = new SocioModel();
            $registros = $model->getSocios();
            return view('socio_panel', [
                'header' => $header, 
                'registros' => $registros
            ]);
        } else{
            return view('login', ['header' => $header]);
        }
    }

    public function formulario_socio(): string 
    {
        $header = view('header');
        return view('tarjeta_socio', ['header' => $header]);
    }

}