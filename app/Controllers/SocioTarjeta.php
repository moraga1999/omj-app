<?php

namespace App\Controllers;
use App\Models\SocioModel;
use App\Models\BeneficioModel;
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

    public function guardar_socio(): RedirectResponse
    {
        helper('form');
        $nombre = $this->request->getPost('nombre');
        $empresa = $this->request->getPost('empresa');
        $direccion = $this->request->getPost('direccion');
        $telefono = $this->request->getPost('telefono');
        $correo = $this->request->getPost('correo');

        $categoria = $this->request->getPost('categoria');
        $beneficio = $this->request->getPost('beneficio');

        $model = new SocioModel();
        $nuevoSocioId = $model->crearSocio($nombre, $empresa, $direccion, $telefono, $correo);
        $model = new BeneficioModel();
        $model->crearBeneficio($categoria, $beneficio, $nuevoSocioId);
        return redirect()->to(base_url('/tarjeta-info'));
    }

    public function evaluar_socio(): RedirectResponse
    {
        //de momento solo habilita al socio
        helper('form');
        $id = $this->request->getPost('id');
        $model = new SocioModel();
        $model->aprobarSocio($id);
        return redirect()->to(base_url('/socios'));
    }

    public function obtener_propuesta($idSocio)
    {
        $model = new BeneficioModel();
        $datos = $model->obtenerBeneficio($idSocio);
        $beneficio = [
            'categoria' => $datos['categoria'],
            'descripcion' => $datos['descripcion']
        ];
        $this->response->setHeader('Content-Type', 'application/json');
        return $this->response->setJSON($beneficio);
    }

}