<?php

namespace App\Controllers;
use App\Models\SocioModel;
use App\Models\BeneficioModel;
use App\Models\AuthModel;
use App\Models\ValidacionModel;
use CodeIgniter\HTTP\RedirectResponse;

class SocioTarjeta extends BaseController
{
    public function index(): string
    {
        $session = session();
        $usuarioData = $session->get('usuario');
        $header = view('header');
        $footer = view('footer');
        if ($usuarioData) {
            $model = new SocioModel();
            $registros = $model->getSocios();
            return view('socio_panel2', [
                'header' => $header, 
                'registros' => $registros,
                'footer' => $footer
            ]);
        } else{
            return view('login', ['header' => $header]);
        }
    }

    public function formulario_socio(): string 
    {
        $header = view('header');
        $footer = view('footer');
        return view('tarjeta_socio', ['header' => $header, 'footer' => $footer]);
    }

    public function guardar_socio(): RedirectResponse
    {
        helper('form');
        $session = session();
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

        $correoFormat = strstr($correo.'', '@', true);
        $userModel = new AuthModel();
        $userModel->crearUsuarioSocio($correo, $correoFormat);
        
        // Mensaje de éxito que se mostrará en la próxima solicitud
        $session->setFlashdata('mensaje', '¡El socio ha sido registrado! te enviaremos un correo a '.$correo.' con más información.');
        return redirect()->to(base_url('/tarjeta-info'));
    }

    public function evaluar_socio(): RedirectResponse
    {
        //de momento solo habilita al socio
        helper('form');
        $id = $this->request->getPost('id');
        $model = new SocioModel();
        $model->cambiarEstadoSocio($id, 1);
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

    public function detalles_socio($id)
    {
        $session = session();
        $usuarioData = $session->get('usuario');
        $header = view('header');
        $footer = view('footer');
        if ($usuarioData) {
            $model = new SocioModel();
            $socio = $model->getSocio($id);
            $model = new BeneficioModel();
            $beneficio = $model->obtenerBeneficio($id);
            $header = view('header');
            return view('socio_detalles', [
                'header' => $header,
                'registro' => $socio,
                'beneficio' => $beneficio,
                'footer' => $footer
            ]);
        }else{
            return view('login', ['header' => $header]);
        }
    }

    public function editar_socio($id)
    {
        $model = new SocioModel();
        $socio = $model->getSocio($id);
        $model = new BeneficioModel();
        $beneficio = $model->obtenerBeneficio($id);
        $header = view('header');
        $footer = view('footer');
        return view('socio_editar', [
            'header' => $header,
            'socio' => $socio,
            'beneficio' => $beneficio,
            'footer' => $footer
        ]);
    }

    public function guardar_cambios()
    {
        helper('form');
        $id = $this->request->getPost('id');
        $nombre = $this->request->getPost('nombre');
        $empresa = $this->request->getPost('empresa');
        $direccion = $this->request->getPost('direccion');
        $telefono = $this->request->getPost('telefono');
        $correo = $this->request->getPost('correo');
        $model = new SocioModel();
        $model->editarSocio($id, $nombre, $empresa, $correo, $direccion, $telefono);
        return redirect()->to(base_url('/detalles-socio/'.$id));
    }

    public function eliminar_beneficio()
    {
        helper('form');
        $id = $this->request->getPost('id');
        $confirmacion = $this->request->getPost('confirmacion');
        $nBeneficios = $this->request->getPost('nBeneficios');
        if ($confirmacion == 'ELIMINAR') {
            $model = new BeneficioModel();
            $model->eliminarBeneficio($id);
            $model = new SocioModel();
            if ($nBeneficios == 1) {
                $model->cambiarEstadoSocio($id, 0);
            }
            return redirect()->to(base_url('/mis-beneficios'));
        }
    }

    public function crear_beneficio()
    {
        helper('form');
        $model = new BeneficioModel();
        $idSocio = $this->request->getPost('id');
        $categoria = $this->request->getPost('categoria');
        $descripcion = $this->request->getPost('descripcion');

        $model->crearBeneficio($categoria, $descripcion, $idSocio);
        return redirect()->to(base_url('/mis-beneficios'));

    }

    public function validacion_tarjeta()
    {
        $session = session();
        $usuarioData = $session->get('usuario');
        
        $model = new SocioModel();
        $socio = $model->getRegistroEmail($usuarioData['email']);
        $model = new BeneficioModel();
        $beneficios = $model->getBeneficios(strval($socio['id']));
        $header = view('header');
        $footer = view('footer');
        return view('socio_validar', [
            'header' => $header,
            'socio' => $socio,
            'beneficios' => $beneficios,
            'footer' => $footer
        ]);
    }

    public function crear_validacion()
    {
        helper('form');
        $model = new ValidacionModel();
        $idJoven = $this->request->getPost('idJoven');
        $idSocio = $this->request->getPost('idSocio');
        $emailSocio = $this->request->getPost('emailSocio');
        $nombreJoven = $this->request->getPost('nombreJoven');
        $beneficio = $this->request->getPost('beneficio');
        $monto = $this->request->getPost('monto');

        $model->crearValidacion($idJoven, $idSocio, $nombreJoven, $emailSocio, $beneficio, $monto);
        return redirect()->to(base_url('/validar-qr'));
    }

    public function panel_validaciones()
    {
        $session = session();
        $model = new ValidacionModel();
        $validaciones = $model->getValidaciones();
        $header = view('header');
        $footer = view('footer');
        return view('validaciones_panel', [
            'header' => $header,
            'validaciones' => json_encode($validaciones),
            'footer' => $footer
        ]);
    }

    public function mis_validaciones()
    {
        $session = session();
        $usuarioData = $session->get('usuario');
        
        $model = new ValidacionModel();
        $validaciones = $model->getValidacionesSocio($usuarioData['email']);
        $header = view('header');
        $footer = view('footer');
        return view('validaciones_panel', [
            'header' => $header,
            'validaciones' => json_encode($validaciones),
            'footer' => $footer
        ]);
    }
}