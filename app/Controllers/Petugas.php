<?php

namespace App\Controllers;

use App\Models\Petugas_model;

class Petugas extends BaseController
{
    protected $petugasModel;

    public function __construct()
    {
        $this->petugasModel = new Petugas_model();
    }

    public function index()
    {
        $data = [
            'getPetugas' => $this->petugasModel->getPetugas(),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        return view('master/petugas/get', $data);
    }
}
