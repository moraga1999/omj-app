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

    public function getSocio($id)
    {
        return $this->find($id);
    }

    public function getRegistroEmail($email)
    {
        return $this->where('correo', $email)->first();
    }
    
    public function editarSocio($id, $nombre, $empresa, $correo, $direccion, $telefono)
    {
        $data = [
            'nombre' => $nombre,
            'empresa' => $empresa,
            'correo' => $correo,
            'direccion' => $direccion,
            'telefono' => $telefono
        ];
        $this->update($id, $data);
    }

    public function cambiarEstadoSocio($id, $estado)
    {
        $data = [
            'activo' => $estado
        ];
        $this->update($id, $data);
    }
}