<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Petugas_model;


class LoginAdmin extends BaseController
{
    protected $userModel;
    protected $petugasModel;

    public function __construct()
    {
        $this->userModel = new User_model();
        $this->petugasModel = new Petugas_model();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/login', $data);
        helper('form');
    }

    public function login()
    {
        if (!$this->validate([
            'user_email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'E-mail harus diisi.',
                    'valid_email' => 'E-mail tidak Valid'
                ]
            ],
            'user_password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password terlalu pendek.',

                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Tidak bisa Login');
            return redirect()->to('/')->withInput()->with('validation', $validation);
        }
        $user_email = $this->request->getPost('user_email');
        $user_password = $this->request->getPost('user_password');
        $user = $this->userModel->where('user_email', $user_email)->first();
        if ($user) {
            if ($user['user_is_active'] == 1) {
                $pass = $user['user_password'];
                $verify_pass = password_verify($user_password, $pass);
                if ($verify_pass) {
                    $data = [
                        'user_id' => $user['user_id'],
                        'user_email' => $user['user_email'],
                        'user_name' => $user['user_name'],
                        'user_image' => $user['user_image'],
                        'user_notelp' => $user['user_notelp'],
                        'user_role_id' => $user['user_role_id'],
                        'user_password' => $user['user_password'],
                        'user_created' => $user['user_created'],
                        'logged_in' => true,
                    ];

                    session()->set($data);
                    // dd($data);

                    if ($user['user_role_id'] == '1') {
                        return redirect()->to('/master');
                    } else if ($user['user_role_id'] == '2') {
                        return redirect()->to('/master');
                    } else {
                        session()->setFlashdata('gagal', 'Email Tidak Ditemukan');
                        return redirect()->to('/');
                    }
                } else {
                    session()->setFlashdata('gagal', 'Password Salah');
                    return redirect()->to('/');
                }
            } else {
                session()->setFlashdata('gagal', 'Data belum diverifikasi');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('gagal', 'Email Tidak Ditemukan');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
