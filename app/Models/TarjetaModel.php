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

    public function getRegistros($estado, $busqueda)
    {
        $query = $this->builder();
        if ($estado != 4) {
            $query->where('estado', $estado);
        }
        if ($busqueda != null) {
            $query->like('rut', $busqueda);
            $query->orLike('nombre', $busqueda);
        }
        return $query->get()->getResult();
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

    public function guardarDocumento($id, $archivo)
    {
        $query = $this->builder();
        $query->where('id', $id);
        $data = [
            'compromiso' => $archivo
        ];
        return $query->update($data);
    }
}