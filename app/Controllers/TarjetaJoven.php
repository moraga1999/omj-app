<?php

namespace App\Controllers;
use App\Models\TarjetaModel;
use CodeIgniter\HTTP\RedirectResponse;

class TarjetaJoven extends BaseController
{
    public function index(): string
    {
        helper('form');
        $session = session();
        $usuarioData = $session->get('usuario');
        if ($usuarioData) {
            $estado = $this->request->getGetPost('filtro_estado');
            if ($estado == null) {
                $estado = 4;
            }
            $busqueda = $this->request->getGetPost('busqueda');
            $model = new TarjetaModel();
            $registros = $model->getRegistros($estado, $busqueda);
            $header = view('header');
            return view('tarjeta_joven', [
                'header' => $header, 
                'registros' => $registros, 
                'estado' => $estado,
                'busqueda' => $busqueda
            ]);
        }
    }

    public function formulario_tarjeta(): string 
    {
        $header = view('header');
        return view('tarjeta_form', ['header' => $header]);
    }

    public function guardar_tarjeta(): RedirectResponse
    {
        helper('form');
        $nombre = $this->request->getPost('nombre');
        $rut = $this->request->getPost('rut');
        $direccion = $this->request->getPost('direccion');
        $nacimiento = $this->request->getPost('nacimiento');
        $telefono = $this->request->getPost('telefono');
        $correo = $this->request->getPost('correo');
        $model = new TarjetaModel();
        $model->crearRegistro($nombre, $rut, $direccion, $nacimiento, $telefono, $correo);
        return redirect()->to(base_url('/'));
    }

    public function guardar_documento(): RedirectResponse
    {
        helper('form');
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('filtro_estado');
        $busqueda = $this->request->getPost('busqueda');
        $archivo = $this->request->getFile('archivo');
        if ($archivo->isValid()) {
            $ruta_temporal = $archivo->getTempName();
            $contenido = file_get_contents($ruta_temporal);
            $archivoBase64 = base64_encode($contenido);
            $model = new TarjetaModel();
            $model->guardarDocumento($id, $archivoBase64);
        }   
        return redirect()->to(base_url('/panel?filtro_estado='.$estado.'&busqueda='.$busqueda));
    }    
}