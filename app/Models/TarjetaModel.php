<?php

namespace App\Models;

use CodeIgniter\Model;

class TarjetaModel extends Model
{
    protected $table = 'tarjetas';
    protected $primaryKey = 'id';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'nombre', 'estado', 'rut', 'direccion', 'nacimiento', 
        'telefono', 'correo', 'documento', 'tarjeta'
    ];

    public function getRegistros($estado)
    {
        $query = $this->builder();
        if ($estado != 4) {
            $query->where('estado', $estado);
        }
        return $query->get()->getResult();
    }

    public function getRegistro($id)
    {
        return $this->find($id);
    }

    public function getRegistroEmail($email)
    {
        return $this->where('correo', $email)->first();
    }

    public function crearRegistro($nombre, $rut, $direccion, $nacimiento, $telefono, $correo)
    {
        $data = [
            'nombre' => $nombre,
            'estado' => 1,
            'rut' => $rut,
            'direccion' => $direccion,
            'nacimiento' => $nacimiento,
            'telefono' => $telefono,
            'correo' => $correo
        ];
        return $this->insert($data);
    }

    public function editarRegistro($id, $nombre, $rut, $direccion, $nacimiento, $telefono, $correo)
    {
        $data = [
            'nombre' => $nombre,
            'rut' => $rut,
            'direccion' => $direccion,
            'nacimiento' => $nacimiento,
            'telefono' => $telefono,
            'correo' => $correo
        ];
        $this->update($id, $data);
    }

    public function cambiarEstado($id, $estado)
    {
        $data = [
            'estado' => $estado
        ];
        $this->update($id, $data);
    }
}