<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Warga_model;


class Register extends BaseController
{
    protected $userModel;
    protected $wargaModel;

    public function __construct()
    {
        $this->userModel = new User_model();
        $this->wargaModel = new Warga_model();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/registrasi', $data);
        helper('form');
    }

    public function registrasi()
    {
        if (!$this->validate([
            'warga_nik' => [
                'rules' => 'required|max_length[16]|is_natural|is_unique[tb_warga.warga_notelp]',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi.',
                    'is_natural' => 'Nomor Telepon tidak Valid',
                    'max_length' => 'Nomor Telepon tidak Valid.',
                    'is_unique' => 'Nomor sudah terdaftar.'
                ]
            ],
            'warga_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi.'
                ]
            ],
            'warga_email' => [
                'rules' => 'required|is_unique[tb_warga.warga_email]|valid_email',
                'errors' => [
                    'required' => 'E-mail harus diisi.',
                    'is_unique' => 'E-mail sudah terdaftar.',
                    'valid_email' => 'E-mail tidak Valid'
                ]
            ],
            'warga_notelp' => [
                'rules' => 'required|max_length[13]|is_natural|is_unique[tb_warga.warga_notelp]',
                'errors' => [
                    'required' => 'Tidak boleh kosong.',
                    'is_natural' => 'Nomor Telepon tidak Valid',
                    'max_length' => 'Nomor Telepon tidak Valid.',
                    'is_unique' => 'Nomor sudah terdaftar.'
                ]
            ],
            'warga_password' => [
                'rules' => 'required|min_length[5]|matches[warga_password_conf]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password terlalu pendek.',
                    'matches' => 'Password tidak sesuai'
                ]
            ],
            'warga_password_conf' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tidak boleh kosong.'
                ]
            ],
            'warga_alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tidak boleh kosong.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/register')->withInput()->with('validation', $validation);
        }
        $modelUser = new User_model;
        $modelWarga = new Warga_model;
        $option = ['cost' => 10];
        $password = $this->request->getPost('warga_password');
        $passwordx = password_hash($password, PASSWORD_DEFAULT, $option);
        $data = [
            'user_name' => $this->request->getPost('warga_nama'),
            'user_email' => $this->request->getPost('warga_email'),
            'user_image' => 'avatar-1.png',
            'user_password' => $passwordx,
            'user_notelp' => $this->request->getPost('warga_notelp'),
            'user_role_id' => 3,
            'user_is_active' => 1
        ];
        $modelUser->saveUser($data);
        $anu = $this->userModel->getUser_id();

        $data2 = [
            'warga_user_id' => $anu->user_id,
            'warga_nik' => $this->request->getPost('warga_nik'),
            'warga_nama' => $this->request->getPost('warga_nama'),
            'warga_email' => $this->request->getPost('warga_email'),
            'warga_password' => $passwordx,
            'warga_image' => 'avatar-1.png',
            'warga_notelp' => $this->request->getPost('warga_notelp'),
            'warga_alamat' => $this->request->getPost('warga_alamat'),
            'warga_is_active' => 1
        ];
        $modelWarga->saveWarga($data2);

        session()->setFlashdata('pesan', 'Registrasi berhasil, tunggu verifikasi akun maksimal 1x24jam');
        return redirect()->to('LoginWarga');
    }
}
