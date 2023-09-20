<?php

namespace App\Models;

use CodeIgniter\Model;

class Petugas_model extends Model
{
    protected $table = 'tb_petugas';
    protected $allowedFields = ['petugas_id', 'petugas_user_id', 'petugas_email', 'petugas_nama', 'petugas_notelp', 'petugas_alamat'];

    public function Jumlah()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getPetugas($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['petugas_id' => $id]);
        }
    }

    public function savePetugas($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editPetugas($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('petugas_id', $id);
        return $builder->update($data);
    }
}
