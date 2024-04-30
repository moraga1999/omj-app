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
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[5]'
        ];
        if ($this->validate($rules)) {
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usuario = $model->auth($email, $password);

            if ($usuario && $usuario['tipo'] == 1) {
                $session = session(); // Obtener la instancia de la sesión
                $session->set('usuario', $usuario);

                return redirect()->to(base_url('/panel'));
            } elseif($usuario && $usuario['tipo'] == 2){
                //usuario socio de una tarjeta
                $session = session(); // Obtener la instancia de la sesión
                $session->set('usuario', $usuario);

                return redirect()->to(base_url('/mis-beneficios'));
            } elseif ($usuario && $usuario['tipo'] == 3) {
                //usuario joven de una tarjeta
                $session = session(); // Obtener la instancia de la sesión
                $session->set('usuario', $usuario);

                return redirect()->to(base_url('/mi-tarjeta'));
            }
            else {
                // Credenciales inválidas
                $data['error'] = 'Credenciales inválidas. Por favor, inténtelo de nuevo.';
                return redirect()->to(base_url('/login'))->withInput()->with('error', $data['error']);
            }
        } else {
            // Validación fallida
            $data['validation'] = $this->validator;
            return redirect()->to(base_url('/login'))->withInput()->with('validation', $data['validation']);
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