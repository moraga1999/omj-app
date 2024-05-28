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

    public function getIdArchivo($id, $tipo)
    {
        $query = $this->builder();
        $query->select('id'); 
        $query->where('tarjeta', $id);
        $query->where('tipo', $tipo);
        $result = $query->get()->getRow();
        return $result ? (int) $result->id : null;
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

    public function getArchivoOwner($id, $tipo)
    {
        $query = $this->builder();
        $query->where('tarjeta', $id);
        $query->where('tipo', $tipo);
        return $query->get()->getRow();
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

    public function eliminarArchivos($tarjeta, $tipo)
    {
        $query = $this->builder();
        $query->where('tarjeta', $tarjeta);
        $query->where('tipo', $tipo);
        $query->delete();
    }
}