<?php

namespace App\Models;

use CodeIgniter\Model;

class BeneficioModel extends Model
{
    protected $table = 'beneficios';
    protected $primaryKey = 'id';
    protected $returnType = 'array';    
    protected $allowedFields = ['categoria', 'descripcion', 'socio'];

    public function crearBeneficio($categoria, $descripcion, $socio)
    {
        $data = [
            'categoria' => $categoria,
            'descripcion' => $descripcion,
            'socio' => $socio,
        ];
        return $this->insert($data);
    }

    public function obtenerBeneficio($socio)
    {
        return $this->where('socio', $socio)->first();
    }

    public function getBeneficios($socio)
    {
        $query = $this->builder();
        $query->where('socio', $socio);
        return $query->get()->getResult();
    }

    public function eliminarBeneficio($id)
    {
        $query = $this->builder();
        $query->where('id', $id);
        $query->delete();
    }
}