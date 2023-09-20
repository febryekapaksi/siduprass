<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Petugas_model;
use App\Models\Warga_model;
use App\Models\Sarpras_model;
use App\Models\Pengaduan_model;


class Home extends BaseController
{
    protected $userModel;
    protected $petugasModel;
    protected $wargaModel;
    protected $sarprasModel;
    protected $pengaduanModel;

    public function __construct()
    {
        $this->userModel = new User_model();
        $this->petugasModel = new Petugas_model();
        $this->wargaModel = new Warga_model();
        $this->sarprasModel = new Sarpras_model();
        $this->pengaduanModel = new Pengaduan_model();

        helper('form');
    }

    public function index()
    {
        $data = [
            'warga_nama' => $this->warga_nama,
            'data' => $this->pengaduanModel->getPengaduantoBeranda(),
            // 'data' => $this->pengaduanModel->getData(),
        ];
        return view('homepage/beranda', $data);
    }

    public function getDataPengaduan()
    {
        $pengaduan_status = $this->request->getPost('pengaduan_status');
        $data = $this->pengaduanModel->get_sarpras($pengaduan_status);
        echo json_encode($data);
    }
}
