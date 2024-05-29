<?php

namespace App\Controllers;

use App\Models\BeneficioModel;
use App\Models\TarjetaModel;
use App\Models\SocioModel;
use chillerlan\QRCode\{QRCode, QROptions};

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
        $usuarioData = $session->get('usuario');
        $model = new TarjetaModel();
        $joven = $model->getRegistroEmail($usuarioData['email']);
        $header = view('header');
        $footer = view('footer');
        $fechaHoy = date("Y-m-d");
        $data   =  $joven['id'].",".$fechaHoy;
        $qrcode = (new QRCode)->render($data);
        return view('mi_tarjeta', ['header' => $header, 'footer' => $footer, 'qrcode' => $qrcode]);
    }

    public function mis_beneficios(): string
    {
        $session = session();
        $usuarioData = $session->get('usuario');
        $model = new SocioModel();
        $socio = $model->getRegistroEmail($usuarioData['email']);
        $model = new BeneficioModel();
        $beneficios = $model->getBeneficios(strval($socio['id']));

        $header = view('header');
        $footer = view('footer');
        return view('mis_beneficios', [
            'header' => $header,
            'footer' => $footer,
            'socio' => $socio,
            'beneficios' => $beneficios
        ]);
    }
}