<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Petugas_model;
use App\Models\Warga_model;
use App\Models\Sarpras_model;
use App\Models\Pengaduan_model;


class Dafpras extends BaseController
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

        ];
        return view('homepage/dafpras', $data);
    }

    public function bangunan()
    {
        $data = [
            'warga_nama' => $this->warga_nama,
            'title'     => 'Bangunan Desa',
            'data'  => $this->sarprasModel->getSarprasbyKategori(1)
        ];

        return view('homepage/dafpras', $data);
    }

    public function transportasi()
    {
        $data = [
            'warga_nama' => $this->warga_nama,
            'title'     => 'Transportasi Desa',
            'data'  => $this->sarprasModel->getSarprasbyKategori(2)
        ];

        return view('homepage/dafpras', $data);
    }

    public function telekomunikasi()
    {
        $data = [
            'warga_nama' => $this->warga_nama,
            'title'     => 'Telekomunikasi Desa',
            'data'  => $this->sarprasModel->getSarprasbyKategori(3)
        ];

        return view('homepage/dafpras', $data);
    }

    public function pendukung()
    {
        $data = [
            'warga_nama' => $this->warga_nama,
            'title'     => 'Pendukung Ekonomi Desa',
            'data'  => $this->sarprasModel->getSarprasbyKategori(4)
        ];

        return view('homepage/dafpras', $data);
    }
}
