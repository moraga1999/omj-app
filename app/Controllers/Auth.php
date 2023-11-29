<?php namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    public function index(): string
    {
        $header = view('header');
        $footer = view('footer');
        helper('form');
        return view('login', ['header' => $header, 'footer' => $footer]);
    }

    public function auth(): RedirectResponse
    {
        $model = new AuthModel();
        helper('form');
        // Validar los datos del formulario
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[5]'
        ];
        if ($this->validate($rules)) {
            // Obtener los datos del formulario
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Intentar autenticar al usuario
            $usuario = $model->auth($email, $password);

            if ($usuario) {
                $session = session(); // Obtener la instancia de la sesión
                $session->set('usuario', $usuario);

                return redirect()->to(base_url('/panel'));
            } else {
                // Credenciales inválidas
                $data['error'] = 'Credenciales inválidas. Por favor, inténtelo de nuevo.';
            }
        } else {
            // Validación fallida
            $data['validation'] = $this->validator;
        }
    }
    
    public function logout(): RedirectResponse
    {
        // Lógica para cerrar sesión
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}