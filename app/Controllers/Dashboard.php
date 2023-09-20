<?php

namespace App\Controllers;

use App\Models\Pengaduan_model;
use App\Models\Petugas_model;
use App\Models\Sarpras_model;
use App\Models\User_model;
use App\Models\Warga_model;

class Dashboard extends BaseController
{
    protected $userModel;
    protected $wargaModel;
    protected $petugasModel;
    protected $sarprasModel;
    protected $pengaduanModel;

    public function __construct()
    {
        $this->userModel = new User_model();
        $this->wargaModel = new Warga_model();
        $this->petugasModel = new Petugas_model();
        $this->sarprasModel = new Sarpras_model();
        $this->pengaduanModel = new Pengaduan_model();

        helper('form');
    }

    public function index()
    {

        $data = [
            'user' => $this->userModel->Jumlah(),
            'warga' => $this->wargaModel->Jumlah(),
            'petugas' => $this->petugasModel->Jumlah(),
            'sarpras' => $this->sarprasModel->Jumlah(),
            'pengaduan' => $this->pengaduanModel->Jumlah(),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];

        session()->set($data);

        return view('master/dashboard', $data);
    }

    public function profile()
    {
        $data = [
            'user_name' => $this->user_name,
            'user_email' => $this->user_email,
            'user_notelp' => $this->user_notelp,
            'user_image' => $this->user_image,
        ];
        return view('master/user/profile', $data);
    }
}
