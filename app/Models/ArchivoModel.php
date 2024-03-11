<?php

namespace App\Models;

use CodeIgniter\Model;

class ArchivoModel extends Model
{
    protected $table = 'archivos';
    protected $primaryKey = 'id';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'formato', 'archivo', 'tarjeta', 'tipo'
    ];

    public function getTipoArchivos($tarjeta)
    {
        $query = $this->builder();
        $query->select('id, tipo'); 
        $query->where('tarjeta', $tarjeta);
        return $query->get()->getResult();
    }

    public function getArchivosTarjeta($tarjeta)
    {
        $query = $this->builder();
        $query->select('*'); 
        $query->where('tarjeta', $tarjeta);
        return $query->get()->getResult();
    }

    public function getArchivo($id)
    {
       return $this->find($id);
    }
    
    public function guardarArchivo($tarjeta, $archivo, $formato, $tipo)
    {
       $data = [
            'formato' => $formato,
            'archivo' => $archivo,
            'tarjeta' => $tarjeta,
            'tipo' => $tipo
        ];
        return $this->insert($data);
    }

    public function eliminarArchivos($tarjeta)
    {
        $query = $this->builder();
        $query->where('tarjeta', $tarjeta);
        $query->delete();
    }
}