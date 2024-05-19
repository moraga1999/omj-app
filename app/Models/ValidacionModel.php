<?php

namespace App\Models;

use CodeIgniter\Model;

class ValidacionModel extends Model
{
    protected $table = 'validaciones';
    protected $primaryKey = 'id';
    protected $returnType = 'array';    
    protected $allowedFields = ['id_joven', 'id_socio',  'nombre_joven', 'email_socio', 'beneficio', 'monto', 'fecha_creacion'];

    public function crearValidacion($idJoven, $idSocio, $nombreJoven, $emailSocio, $beneficio, $monto)
    {
        $data = [
            'id_joven' => $idJoven,
            'id_socio' => $idSocio,
            'nombre_joven' => $nombreJoven,
            'email_socio' => $emailSocio,
            'beneficio' => $beneficio,
            'monto' => $monto
        ];
        return $this->insert($data);
    }

    public function getValidaciones()
    {
        return $this->findAll();
    }

    public function getValidacionesSocio($email)
    {
        $query = $this->builder();
        $query->where('email_socio', $email);
        return $query->get()->getResult();
    }

}