<?php

namespace App\Models;

use CodeIgniter\Model;

class Warga_model extends Model
{
    protected $table = 'tb_warga';
    protected $allowedFields = ['warga_id', 'warga_user_id', 'warga_nik', 'warga_nama', 'warga_email', 'warga_password', 'warga_image', 'warga_notelp', 'warga_alamat', 'warga_is_active'];

    public function Jumlah()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getWarga($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['warga_id' => $id]);
        }
    }

    public function saveWarga($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editWarga($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('warga_id', $id);
        return $builder->update($data);
    }
}
