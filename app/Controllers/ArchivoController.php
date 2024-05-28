<?php

namespace App\Controllers;

use App\Models\ArchivoModel;
use App\Models\TarjetaModel;
use App\Models\SocioModel;
use CodeIgniter\HTTP\RedirectResponse;


class ArchivoController extends BaseController
{
    public function guardar_documento(): RedirectResponse
    {
        helper('form');
        $id = $this->request->getPost('id');
        $tipo = $this->request->getPost('tipo');
        $archivo = $this->request->getFile('archivo');
        if ($archivo->isValid()) {
            $ruta_temporal = $archivo->getTempName();
            $contenido = file_get_contents($ruta_temporal);
            $formato = $archivo->getClientExtension();
            $archivoBase64 = base64_encode($contenido);
            $model = new ArchivoModel();
            $model->guardarArchivo($id, $archivoBase64 , $formato, $tipo);
        }
        if($tipo == 'compromiso')
        {
            $model = new TarjetaModel();
            $model->cambiarEstado($id, 1);
            return redirect()->to(base_url('/panel'));
        } elseif($tipo == 'convenio') 
        {
            $model = new SocioModel();
            $model->cambiarEstadoSocio($id, 1);
            return redirect()->to(base_url('/socios'));
        } 
        
    }

    public function eliminar_archivos()
    {
        helper('form');
        $id = $this->request->getPost('id');
        $tipo = $this->request->getPost('tipo');
        $confirmacion = $this->request->getPost('confirmacion');
        if ($confirmacion == 'ELIMINAR') {
            $model = new ArchivoModel();
            $model->eliminarArchivos($id, $tipo);
            if($tipo == 'compromiso')
            {
                $model = new TarjetaModel();
                $model->cambiarEstado($id, 0);
                return redirect()->to(base_url('/tarjeta/'.$id));
            } elseif($tipo == 'convenio') 
            {
                $model = new SocioModel();
                $model->cambiarEstadoSocio($id, 0);
                return redirect()->to(base_url('/detalles-socio/'.$id));
            } 
        }
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
}