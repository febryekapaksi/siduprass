<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Petugas_model;
use App\Models\Warga_model;
use App\Models\Sarpras_model;
use App\Models\Pengaduan_model;


class Aduan extends BaseController
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
        $id = session()->get('warga_id');
        $data = [
            'getOptionKategori' => $this->sarprasModel->getOptionKategori(),
            'warga_nama' => $this->warga_nama,
            'warga_id' => $this->warga_id,
            'validation' => \Config\Services::validation(),
            'riwayat' => $this->pengaduanModel->getPengaduanWarga($id)
        ];
        return view('homepage/pengaduan', $data);
    }

    public function get_sarpras()
    {
        $kategori_id = $this->request->getPost('kategori_id');
        $data = $this->pengaduanModel->get_sarpras($kategori_id);
        echo json_encode($data);
    }

    public function save()
    {
        if (!$this->validate([
            'sarpras_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kategori Sarpras.'
                ]
            ],
            'sarpras_nama' => [
                'rules' => 'required|is_unique[tb_pengaduan.pengaduan_sarpras_id]',
                'errors' => [
                    'required' => 'Pilih Nama Sarpras.',
                    'is_unique' => 'Sarpras yang dipilih sudah diadukan.'
                ]
            ],
            'pengaduan_isi' => [
                'rules' => 'required|max_length[30]',
                'errors' => [
                    'required' => 'Laporan harus terisi.',
                    'max_length' => 'Laporan terlalu panjang'
                ]
            ],
            'pengaduan_foto' => [
                'rules' => 'required|max_size[pengaduan_foto,2048]|is_image[pengaduan_foto]|mime_in[pengaduan_foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'required' => 'Silahkan masukan gambar terlebih dulu.',
                    'max_size' => 'Ukuran gambar tidak boleh melebihi 2 MB',
                    'is_image' => 'Upload File dengan ekstensi JPG/JPEG/PNG',
                    'mime_in' => 'Upload File dengan ekstensi JPG/JPEG/PNG.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/home/aduan')->withInput()->with('validation', $validation);
        }

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
            'pengaduan_warga_id' => $this->request->getPost('warga_id'),
            'pengaduan_kategori_id' => $this->request->getPost('sarpras_kategori'),
            'pengaduan_sarpras_id' => $this->request->getPost('sarpras_nama'),
            'pengaduan_isi' => $this->request->getPost('pengaduan_isi'),
            'pengaduan_foto' => $namaGambar,
            'pengaduan_lng' => $this->request->getPost('pengaduan_lng'),
            'pengaduan_lat' => $this->request->getPost('pengaduan_lat'),
            'pengaduan_status' => 'menunggu',
        ];
        $model->savePengaduan($data);
        session()->setFlashdata('pesan', 'Aduan berhasil terkirim');
        return redirect()->to('home/aduan');
    }
}
