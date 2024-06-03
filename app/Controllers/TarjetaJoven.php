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
        $header = view('header', ['activeLink' => 'panel']);
        $footer = view('footer');
        if ($usuarioData) {
            $model = new TarjetaModel();
            $registros = $model->getRegistros();
            $model = new ArchivoModel();
            foreach($registros as $registro){
                $compromiso = $model->getIdArchivo($registro->id, 'compromiso');
                $registro->compromiso = $compromiso;
            }
            return view('tarjeta_joven', [
                'header' => $header, 
                'registros' => $registros,
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
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $secretKey = env('reCAPTCHA_SECRET');
        $credential = [
            'secret' => $secretKey,
            'response' => $recaptchaResponse
        ];
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        curl_close($verify);

        $status = json_decode($response, true);

        if ($status['success']) {
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
            return redirect()->to(base_url('/'))->with('message', 'Formulario enviado correctamente');
        } else {
            // Manejo de error, reCAPTCHA no es válido
            return redirect()->back()->with('error', 'Verificación de reCAPTCHA fallida, por favor intenta de nuevo.');
        }
    }

    public function guardar_qr(): RedirectResponse
    {
        //codigo muerto, tarjetas se construyen dinamicamente
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
            return view('tarjeta_detalles', [
                'header' => $header,
                'registro' => $registro,
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
            return view('tarjeta_editar', [
                'header' => $header,
                'registro' => $registro,
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

    public function validar_tarjeta($id, $fecha)
    {
        $session = session();
        $usuarioData = $session->get('usuario');
        $model = new TarjetaModel();
        $fechaHoy = date("Y-m-d");
        if ($usuarioData && $fechaHoy == $fecha) {
            $resultado = $model->getRegistro($id);
            header('Content-Type: application/json');
            echo json_encode($resultado);
        }
    }

    public function beneficios_vitrina()
    {
        $session = session();
        $model = new SocioModel();
        $listaSocios = $model->getSociosBeneficios();
        $header = view('header', ['activeLink' => 'vitrina']);
        $footer = view('footer');
        return view('beneficios_vitrina', [
            'header' => $header,
            'listaSocios' => json_encode($listaSocios),
            'footer' => $footer
        ]);
    }

}