<?php

namespace App\Models;

use CodeIgniter\Model;

class SocioModel extends Model
{
    protected $table = 'socios';
    protected $primaryKey = 'id';
    protected $returnType = 'array';    
    protected $allowedFields = ['nombre', 'empresa', 'correo', 'direccion', 'telefono', 'activo'];

    public function getSocios()
    {
        $query = $this->builder();
        $query->orderBy('nombre', 'ASC');
        return $query->get()->getResult();
    }

    public function getSociosBeneficios()
    {
        $query = $this->builder();
        $query->select('*');
        $query->join('beneficios', 'socios.id = beneficios.socio');
        $query->where('activo = 1');
        return $query->get()->getResult();
    }

    public function crearSocio($nombre, $empresa, $direccion, $telefono, $correo)
    {
        $data = [
            'nombre' => $nombre,
            'empresa' => $empresa,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'correo' => $correo
        ];
        return $this->insert($data);
    }

    public function aprobarSocio($id)
    {
        $query = $this->builder();
        $data = [
            'activo' => 1
        ];
        $query->where('id', $id);
        $query->update($data);
    }
}