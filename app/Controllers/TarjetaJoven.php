<?php

namespace App\Controllers;
use App\Models\TarjetaModel;
use App\Models\ArchivoModel;
use App\Models\AuthModel;
use App\Models\SocioModel;
use CodeIgniter\HTTP\RedirectResponse;

class TarjetaJoven extends BaseController
{
    public function index(): string
    {
        helper('form');
        $session = session();
        $usuarioData = $session->get('usuario');
        $header = view('header');
        $footer = view('footer');
        if ($usuarioData) {
            $estado = $this->request->getGetPost('filtro_estado');
            if ($estado == null) {
                $estado = 1;
            }
            $model = new TarjetaModel();
            $registros = $model->getRegistros($estado);
            $model = new ArchivoModel();
            foreach($registros as $registro){
                $archivos = $model->getTipoArchivos($registro->id);
                foreach($archivos as $archivo){
                    if($archivo->tipo == 'compromiso'){
                        $registro->compromiso = $archivo->id;
                    }else if($archivo->tipo == 'tarjeta'){
                        $registro->tarjeta = $archivo->id;
                    }
                }
            }
            return view('tarjeta_joven2', [
                'header' => $header, 
                'registros' => $registros, 
                'estado' => $estado,
                'footer' => $footer
            ]);
        } else{
            return view('login', ['header' => $header, 'footer' => $footer]);
        }
    }

    public function tarjeta_info()
    {
        $model = new SocioModel();
        $listaSocios = $model->getSociosBeneficios();
        $header = view('header');
        $footer = view('footer');
        return view('tarjeta_info', [
            'header' => $header,
            'listaSocios' => $listaSocios,
            'footer' => $footer
        ]);
    }    

    public function formulario_tarjeta(): string 
    {
        $header = view('header');
        $footer = view('footer');
        return view('tarjeta_form', ['header' => $header, 'footer' => $footer]);
    }

    public function guardar_tarjeta(): RedirectResponse
    {
        helper('form');
        $nombre = $this->request->getPost('nombre');
        $rut = $this->request->getPost('rut');
        $rut = str_replace(['.', '-'], '', $rut);
        $direccion = $this->request->getPost('direccion');
        $nacimiento = $this->request->getPost('nacimiento');
        $telefono = $this->request->getPost('telefono');
        $correo = $this->request->getPost('correo');
        $model = new TarjetaModel();
        $model->crearRegistro($nombre, $rut, $direccion, $nacimiento, $telefono, $correo);
        $userModel = new AuthModel();
        $userModel->crearUsuarioJoven($correo, $rut);
        return redirect()->to(base_url('/'));
    }

    public function guardar_documento(): RedirectResponse
    {
        helper('form');
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('filtro_estado');
        $archivo = $this->request->getFile('archivo');
        if ($archivo->isValid()) {
            $ruta_temporal = $archivo->getTempName();
            $contenido = file_get_contents($ruta_temporal);
            $formato = $archivo->getClientExtension();
            $archivoBase64 = base64_encode($contenido);
            $model = new ArchivoModel();
            $model->guardarArchivo($id, $archivoBase64 , $formato, 'compromiso');
        }   
        return redirect()->to(base_url('/panel?filtro_estado='.$estado));
    }

    public function guardar_qr(): RedirectResponse
    {
        helper('form');
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('filtro_estado');
        $archivo = $this->request->getFile('archivo');
        if ($archivo->isValid()) {
            $ruta_temporal = $archivo->getTempName();
            $contenido = file_get_contents($ruta_temporal);
            $formato = $archivo->getClientExtension();
            $archivoBase64 = base64_encode($contenido);
            $model = new ArchivoModel();
            $model->guardarArchivo($id, $archivoBase64 , $formato, 'tarjeta');
        }   
        return redirect()->to(base_url('/panel?filtro_estado='.$estado));
    }

    public function obtener_archivo($id)
    {
        $model = new ArchivoModel();
        $resultado = $model->getArchivo($id);
        $datos['formato'] = $resultado['formato'];
        $datos['archivo'] = $resultado['archivo'];
        header('Content-Type: application/json');
        echo json_encode($datos);
    }

    public function detalles_tarjeta($id)
    {
        $session = session();
        $usuarioData = $session->get('usuario');
        $header = view('header');
        $footer = view('footer');
        if ($usuarioData) {
            $model = new TarjetaModel();
            $registro = $model->getRegistro($id);
            $model = new ArchivoModel();
            $archivos = $model->getArchivosTarjeta($id);            
            return view('tarjeta_detalles', [
                'header' => $header,
                'registro' => $registro,
                'archivos' => $archivos,
                'footer' => $footer
            ]);
        }else{
            return view('login', ['header' => $header, 'footer' => $footer]);
        }
    }

    public function editar_tarjeta($id)
    {
        $session = session();
        $usuarioData = $session->get('usuario');
        $header = view('header');
        $footer = view('footer');
        if ($usuarioData) {
            $model = new TarjetaModel();
            $registro = $model->getRegistro($id);
            $model = new ArchivoModel();
            $archivos = $model->getArchivosTarjeta($id);            
            return view('tarjeta_editar', [
                'header' => $header,
                'registro' => $registro,
                'archivos' => $archivos,
                'footer' => $footer
            ]);
        }else{
            return view('login', ['header' => $header, 'footer' => $footer]);
        }
    }

    public function guardar_cambios()
    {
        helper('form');
        $id = $this->request->getPost('id');
        $nombre = $this->request->getPost('nombre');
        $rut = $this->request->getPost('rut');
        $direccion = $this->request->getPost('direccion');
        $nacimiento = $this->request->getPost('nacimiento');
        $telefono = $this->request->getPost('telefono');
        $correo = $this->request->getPost('correo');
        $model = new TarjetaModel();
        $model->editarRegistro($id, $nombre, $rut, $direccion, $nacimiento, $telefono, $correo);
        return redirect()->to(base_url('/tarjeta/'.$id));
    }

    public function eliminar_archivos()
    {
        helper('form');
        $id = $this->request->getPost('id');
        $confirmacion = $this->request->getPost('confirmacion');
        if ($confirmacion == 'ELIMINAR') {
            $model = new ArchivoModel();
            $model->eliminarArchivos($id);
            $model = new TarjetaModel();
            $model->cambiarEstado($id, 1);
            return redirect()->to(base_url('/tarjeta/'.$id));
        }
    }

}