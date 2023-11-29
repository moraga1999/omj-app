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

}