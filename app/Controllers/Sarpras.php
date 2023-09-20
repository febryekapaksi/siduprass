<?php

namespace App\Controllers;

use App\Models\Sarpras_model;

class Sarpras extends BaseController
{
    protected $getSarpras;

    public function __construct()
    {
        $this->sarprasModel = new Sarpras_model();
    }
    public function index()
    {
        $data = [
            'getSarpras' => $this->sarprasModel->getSarpras(),
            'sarpras' => $this->sarprasModel->getkategori(),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        return view('master/sarpras/get', $data);
    }

    public function add()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'getOptionKategori' => $this->sarprasModel->getOptionKategori(),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        return view('master/sarpras/add', $data);
    }

    public function detail($id)
    {
        $model = new Sarpras_model;
        $getSarpras = $model->getSarpras($id)->getRow();
        $data = [
            'sarpras' => $getSarpras,
            'kategori' => $model->getKategori2($id),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        return view('master/sarpras/detail', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'sarpras_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih kategori dulu.'
                ]
            ],
            'sarpras_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama sarpras harus diisi.',
                ]
            ],
            'sarpras_gambar' => [
                'rules' => 'max_size[sarpras_gambar,2048]|is_image[sarpras_gambar]|mime_in[sarpras_gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh melebihi 2 MB',
                    'is_image' => 'Upload File dengan ekstensi JPG/JPEG/PNG',
                    'mime_in' => 'Upload File dengan ekstensi JPG/JPEG/PNG.'
                ]
            ],
            'sarpras_ket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'keterangan harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/master/sarpras/edit')->withInput()->with('validation', $validation);
        }

        //ambil gambar
        $fileGambar = $this->request->getFile('sarpras_gambar');
        //jika tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'product-5.png';
        } else {
            //generate nama gambar random
            $namaGambar = $fileGambar->getName();
            $fileGambar->move('images', $namaGambar);
        }

        $model = new Sarpras_model();
        $data = array(
            'sarpras_nama' => $this->request->getPost('sarpras_nama'),
            'sarpras_gambar' => $namaGambar,
            'sarpras_ket' => $this->request->getPost('sarpras_ket'),
            'sarpras_dibuat' => $this->request->getPost('sarpras_dibuat'),
            'sarpras_kategori_id' => $this->request->getPost('sarpras_kategori')
        );
        $model->saveSarpras($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/master/sarpras');
    }

    public function edit($id)
    {
        $model = new Sarpras_model;
        $getSarpras = $model->getSarpras($id)->getRow();
        if (isset($getSarpras)) {
            $data = [
                'sarpras' => $getSarpras,
                'kategori' => $model->getKategori2($id),
                'getOptionKategori' => $this->sarprasModel->getOptionKategori(),
                'validation' => \Config\Services::validation(),
                'user_name' => $this->user_name,
                'user_image' => $this->user_image
            ];
            return view('master/sarpras/edit', $data);
        } else {
            session()->set_flashdata('gagal', 'Data tidak ditemukan');
            return redirect()->to('/master/sarpras');
        }
    }

    public function update($id)
    {
        if (!$this->validate([
            'sarpras_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih kategori dulu.'
                ]
            ],
            'sarpras_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama sarpras harus diisi.',
                ]
            ],
            'sarpras_gambar' => [
                'rules' => 'max_size[sarpras_gambar,2048]|is_image[sarpras_gambar]|mime_in[sarpras_gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh melebihi 2 MB',
                    'is_image' => 'Upload File dengan ekstensi JPG/JPEG/PNG',
                    'mime_in' => 'Upload File dengan ekstensi JPG/JPEG/PNG.'
                ]
            ],
            'sarpras_ket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'keterangan harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('master/sarpras/' . $id . '/edit')->withInput()->with('validation', $validation);
        }
        //ambil gambar
        $fileGambar = $this->request->getFile('sarpras_gambar');
        //jika tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'product-5.png';
        } else {
            //generate nama gambar random
            $namaGambar = $fileGambar->getName();
            $fileGambar->move('images', $namaGambar);
        }

        $model = new Sarpras_model();
        $data = array(
            'sarpras_nama' => $this->request->getPost('sarpras_nama'),
            'sarpras_gambar' => $namaGambar,
            'sarpras_ket' => $this->request->getPost('sarpras_ket'),
            'sarpras_kategori_id' => $this->request->getPost('sarpras_kategori')
        );
        $model->editSarpras($data, $id);

        session()->setFlashdata('pesan', 'Data berhasil dirubah');

        return redirect()->to('/master/sarpras');
    }

    public function hapus($id)
    {
        $model = new Sarpras_model;
        $getSarpras = $model->getSarpras($id)->getRow();
        if (isset($getSarpras)) {
            $model->hapusSarpras($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('master/sarpras');
        } else {
            session()->setFlashdata('gagal', 'Data gagal dihapus');
            return redirect()->to('/master/sarpras');
        }
    }
}
