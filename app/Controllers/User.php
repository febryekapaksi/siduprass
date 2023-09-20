<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Petugas_model;
use App\Models\Warga_model;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User_model();
        $this->petugasModel = new Petugas_model();
        $this->wargaModel = new Warga_model();
    }

    public function index()
    {
        $data = [
            'getUser' => $this->userModel->getUser(),
            'user' => $this->userModel->getRole(),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        return view('master/user/get', $data);
    }

    public function add()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'getOptionRole' => $this->userModel->getOptionRole(),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        return view('master/user/add', $data);
    }

    public function detail($id)
    {
        $model = new User_model;
        $getUser = $model->getUser($id)->getRow();
        $data = [
            'user' => $getUser,
            'role' => $model->getSebagai($id),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        return view('master/user/detail', $data);
    }

    public function edit($id)
    {
        $model = new User_model;
        $getUser = $model->getUser($id)->getRow();
        if (isset($getUser)) {
            $data = [
                'user' => $getUser,
                'validation' => \Config\Services::validation(),
                'user_name' => $this->user_name,
                'user_image' => $this->user_image
            ];
            return view('master/user/edit', $data);
        } else {
            session()->set_flashdata('gagal', 'Data tidak ditemukan');
            return redirect()->to('/master/user');
        }
    }

    public function save()
    {
        if (!$this->validate([
            'user_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi.'
                ]
            ],
            'user_email' => [
                'rules' => 'required|is_unique[tb_user.user_email]|valid_email',
                'errors' => [
                    'required' => 'E-mail harus diisi.',
                    'is_unique' => 'E-mail sudah terdaftar.',
                    'valid_email' => 'E-mail tidak Valid'
                ]
            ],
            'user_notelp' => [
                'rules' => 'required|max_length[13]|is_natural|is_unique[tb_user.user_notelp]',
                'errors' => [
                    'required' => 'Tidak boleh kosong.',
                    'is_natural' => 'Nomor Telepon tidak Valid',
                    'max_length' => 'Nomor Telepon tidak Valid.',
                    'is_unique' => 'Nomor sudah terdaftar.'
                ]
            ],
            'user_password' => [
                'rules' => 'required|min_length[5]|matches[user_password_conf]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password terlalu pendek.',
                    'matches' => 'Password tidak sesuai'
                ]
            ],
            'user_password_conf' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tidak boleh kosong.'
                ]
            ],
            'user_role_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/master/user/add')->withInput()->with('validation', $validation);
        }
        $modelUser = new User_model;
        $modelPetugas = new Petugas_model;
        $modelWarga = new Warga_model;
        $option = ['cost' => 10];
        $password = $this->request->getPost('user_password');
        $passwordx = password_hash($password, PASSWORD_DEFAULT, $option);
        $data = [
            'user_name' => $this->request->getPost('user_name'),
            'user_email' => $this->request->getPost('user_email'),
            'user_image' => 'avatar-1.png',
            'user_password' => $passwordx,
            'user_notelp' => $this->request->getPost('user_notelp'),
            'user_role_id' => $this->request->getPost('user_role_id'),
            'user_is_active' => 1
        ];

        $hak = $this->request->getPost('user_role_id');

        if ($hak == 3) {
            $modelUser->saveUser($data);
            $anu = $this->userModel->getUser_id();
            $wargadata = [
                'warga_nama' => $this->request->getPost('user_name'),
                'warga_email' => $this->request->getPost('user_email'),
                'warga_password' => $passwordx,
                'warga_image' => 'avatar-1.png',
                'warga_notelp' => $this->request->getPost('user_notelp'),
                'warga_user_id' => $anu->user_id
            ];
            $modelWarga->saveWarga($wargadata);
        } elseif ($hak == 2) {
            $modelUser->saveUser($data);
            $anu = $this->userModel->getUser_id();
            $petugasdata = [
                'petugas_nama' => $this->request->getPost('user_name'),
                'petugas_email' => $this->request->getPost('user_email'),
                'petugas_password' => $passwordx,
                'petugas_notelp' => $this->request->getPost('user_notelp'),
                'petugas_user_id' => $anu->user_id
            ];
            $modelPetugas->savePetugas($petugasdata);
        } else {
            $modelUser->saveUser($data);
        }

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/master/user');
    }

    public function update($id)
    {
        if (!$this->validate([
            'user_email' => [
                'rules' => "is_not_unique[tb_user.user_email,user_id,{$id}]|required|valid_email",
                'errors' => [
                    'required' => 'E-mail harus diisi.',
                    'is_not_unique' => 'E-mail sudah terdaftar.',
                    'valid_email' => 'E-mail tidak Valid'
                ]
            ],
            'user_image' => [
                'rules' => "uploaded[user_image]|max_size[user_image,2048]|mime_in[user_image,image/png,image/jpg]",
                'errors' => [
                    'max_size' => 'Ukuran gambar telalu besar.',
                    'mime_in' => 'Format gambar tidak didukung.',
                    'uploaded' => 'Gambar tidak sesuai'
                ]
            ],
            'user_notelp' => [
                'rules' => 'required|max_length[13]|is_natural',
                'errors' => [
                    'required' => 'Tidak boleh kosong.',
                    'is_natural' => 'Nomor Telepon tidak Valid',
                    'max_length' => 'Nomor Telepon tidak Valid.',
                ]
            ],
            'user_password' => [
                'rules' => 'required|min_length[5]|matches[user_password_conf]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password terlalu pendek.',
                    'matches' => 'Password tidak sesuai'
                ]
            ],
            'user_password_conf' => [
                'rules' => 'required|matches[user_password]',
                'errors' => [
                    'required' => 'Tidak boleh kosong.',
                    'matches' => 'Password tidak sesuai.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/master/user/' . $id . '/edit')->withInput()->with('validation', $validation);
        }

        $id = $this->request->getPost('user_id');

        //ambil gambar
        $fileGambar = $this->request->getFile('user_image');
        //jika tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'avatar-1.png';
        } else {
            //generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('images', $namaGambar);
        }

        $option = ['cost' => 10];
        $password = $this->request->getPost('user_password');
        $passwordx = password_hash($password, PASSWORD_DEFAULT, $option);
        $data = [
            'user_email' => $this->request->getPost('user_email'),
            'user_image' => $namaGambar,
            'user_password' => $passwordx,
            'user_notelp' => $this->request->getPost('user_notelp'),
        ];

        $hak = $this->request->getVar('user_role_id');
        $modelUser = new User_model();
        $modelPetugas = new Petugas_model();
        $modelWarga = new Warga_model();

        if ($hak == 3) {
            $modelUser->editUser($data, $id);
            $wargadata = [
                'warga_email' => $this->request->getPost('user_email'),
                'warga_notelp' => $this->request->getPost('user_notelp')
            ];
            $modelWarga->editWarga($wargadata, $id);
        } elseif ($hak == 2) {
            $modelUser->editUser($data, $id);
            $petugasdata = [
                'petugas_email' => $this->request->getPost('user_email'),
                'petugas_notelp' => $this->request->getPost('user_notelp')
            ];
            $modelPetugas->editPetugas($petugasdata, $id);
        } else {
            $modelUser->editUser($data, $id);
        }

        session()->setFlashdata('pesan', 'Data berhasil dirubah');

        return redirect()->to('/master/user');
    }

    public function hapus($id)
    {
        $model = new User_model;
        $getUser = $model->getUser($id)->getRow();
        if (isset($getUser)) {
            $model->hapusUser($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('master/user');
        } else {
            session()->setFlashdata('gagal', 'Data gagal dihapus');
            return redirect()->to('/master/user');
        }
    }
}
