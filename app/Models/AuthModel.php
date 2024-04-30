<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $returnType = 'array';    
    protected $allowedFields = ['email','password','tipo'];

    //falta hash, más adelante
    public function auth($email, $password)
    {
        $user = $this->where(['email' => $email, 'password' => $password])->first();
        return $user;
    }

    public function crearUsuarioSocio($correo, $password)
    {
        $data = [
            'email' => $correo,
            'password' => $password,
            'tipo' => 2,
        ];
        return $this->insert($data);
    }

    public function crearUsuarioJoven($correo, $password)
    {
        $data = [
            'email' => $correo,
            'password' => $password,
            'tipo' => 3,
        ];
        return $this->insert($data);
    }

}