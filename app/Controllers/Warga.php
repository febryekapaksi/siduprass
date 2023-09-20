<?php

namespace App\Controllers;

use App\Models\Warga_model;

class Warga extends BaseController
{
    protected $wargaModel;

    public function __construct()
    {
        $this->wargaModel = new Warga_model();
    }

    public function index()
    {
        $data = [
            'getWarga' => $this->wargaModel->getWarga(),
            'user_name' => $this->user_name,
            'user_image' => $this->user_image
        ];
        return view('master/warga/get', $data);
    }
}
