<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Petugas_model;
use App\Models\Warga_model;
use App\Models\Sarpras_model;
use App\Models\Pengaduan_model;

class Pengaduan extends BaseController
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
        session();
    }

    public function index()
    {
        $data = [
            'getPengaduan' => $this->pengaduanModel->getPengaduan(),
            'data' => $this->pengaduanModel->getData(),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        // dd($data);

        return view('master/pengaduan/get', $data);
    }

    public function detail($id)
    {
        $model = new Pengaduan_model;
        $getPengaduan = $model->getPengaduan($id)->getRow();
        $data = [
            'pengaduan' => $getPengaduan,
            'data' => $model->getDetail($id),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        return view('master/pengaduan/detail', $data);
    }

    public function edit($id)
    {
        $model = new Pengaduan_model;
        $getPengaduan = $model->getPengaduan($id)->getRow();
        if (isset($getPengaduan)) {
            $data = [
                'pengaduan' => $getPengaduan,
                'validation' => \Config\Services::validation(),
                'user_name' => $this->user_name,
                'user_id' => $this->user_id,
                'user_image' => $this->user_image
            ];
            // dd($data);
            return view('master/pengaduan/edit', $data);
        } else {
            session()->set_flashdata('gagal', 'Data tidak ditemukan');
            return redirect()->to('/master/pengaduan');
        }
    }

    public function update($id)
    {
        //ambil gambar
        $fileGambar = $this->request->getFile('pengaduan_foto');
        //jika tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'product-5.png';
        } else {
            //generate nama gambar random
            $namaGambar = $fileGambar->getName();
            $fileGambar->move('images', $namaGambar);
        }

        $model = new Pengaduan_model();
        $data = [
            'pengaduan_petugas_id' => $this->request->getPost('user_id'),
            'pengaduan_foto' => $namaGambar,
            'pengaduan_status' => $this->request->getPost('pengaduan_status')
        ];
        $model->editPengaduan($data, $id);

        session()->setFlashdata('pesan', 'Data berhasil dirubah');

        return redirect()->to('master/pengaduan/');
    }

    public function hapus($id)
    {
        $model = new Pengaduan_model;
        $getPengaduan = $model->getPengaduan($id)->getRow();
        if (isset($getPengaduan)) {
            $model->hapusPengaduan($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('master/pengaduan');
        } else {
            session()->setFlashdata('gagal', 'Data gagal dihapus');
            return redirect()->to('/master/pengaduan');
        }
    }
}
