<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Warga_model;


class LoginWarga extends BaseController
{

    protected $wargaModel;

    public function __construct()
    {
        $this->wargaModel = new Warga_model();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/loginWarga', $data);
        helper('form');
    }

    public function login()
    {
        $warga_email = $this->request->getPost('warga_email');
        $warga_password = $this->request->getPost('warga_password');
        $warga = $this->wargaModel->where('warga_email', $warga_email)->first();
        if ($warga) {
            if ($warga['warga_is_active'] == 1) {
                $pass = $warga['warga_password'];
                $verify_pass = password_verify($warga_password, $pass);
                if ($verify_pass) {
                    $data = [
                        'warga_id' => $warga['warga_id'],
                        'warga_email' => $warga['warga_email'],
                        'warga_nama' => $warga['warga_nama'],
                        'warga_password' => $warga['warga_password'],
                        'logged_in' => true,
                    ];

                    session()->set($data);
                    // dd($data);
                    return redirect()->to('/home');
                } else {
                    session()->setFlashdata('gagal', 'Password Salah');
                    return redirect()->to('LoginWarga');
                }
            } else {
                session()->setFlashdata('gagal', 'Data belum terverifikasi');
                return redirect()->to('LoginWarga');
            }
        } else {
            session()->setFlashdata('gagal', 'Email Tidak Ditemukan');
            return redirect()->to('LoginWarga');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/home');
    }
}
