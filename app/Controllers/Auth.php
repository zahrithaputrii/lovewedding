<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form']);
    }
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        return view('auth/login');
    }

    public function loginProcess()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel
            ->where('email', $email)
            ->where('active', 1)
            ->first();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
        session()->regenerate();

        session()->set([
            'user_id'   => $user['id'],
            'email'     => $user['email'],
            'username'  => $user['username'] ?? '',
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        if ($user['role'] === 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $this->userModel->insert([
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password_hash' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role'   => 'user',
            'active' => 1
        ]);

        return redirect()->to('/login')
            ->with('success', 'Akun berhasil dibuat, silakan login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
