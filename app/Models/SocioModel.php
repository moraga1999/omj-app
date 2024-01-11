<?php

namespace App\Models;

use CodeIgniter\Model;

class SocioModel extends Model
{
    protected $table = 'socios';
    protected $primaryKey = 'id';
    protected $returnType = 'array';    
    protected $allowedFields = ['nombre', 'empresa', 'email', 'direccion', 'telefono'];

    public function getSocios()
    {
        $query = $this->builder();
        $query->orderBy('nombre', 'ASC');
        return $query->get()->getResult();
    }
}