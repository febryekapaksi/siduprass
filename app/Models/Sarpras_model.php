<?php

namespace App\Models;

use CodeIgniter\Model;

class Sarpras_model extends Model
{
    protected $table = 'tb_sarpras';
    protected $allowedFields = ['sarpras_id', 'sarpras_nama', 'sarpras_gambar', 'sarpras_ket', 'sarpras_dibuat', 'sarpras_kategori_id'];

    public function Jumlah()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getSarpras($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['sarpras_id' => $id]);
        }
    }

    public function getOptionKategori()
    {
        $builder = $this->db->table('tb_kategori')
            ->select('*')->get()->getResult();
        return $builder;
    }

    public function getSarprasbyKategori($id)
    {
        $builder = $this->db->table('tb_sarpras')
            ->select('*')
            ->join('tb_kategori', 'tb_sarpras.sarpras_kategori_id=tb_kategori.kategori_id')
            ->where('tb_sarpras.sarpras_kategori_id', $id);
        $data = $builder->get()->getResult();
        return $data;
    }

    public function getKategori()
    {
        $builder = $this->db->table('tb_sarpras')
            ->select('*')
            ->join('tb_kategori', 'tb_sarpras.sarpras_kategori_id=tb_kategori.kategori_id')
            ->orderBy('tb_kategori.kategori_nama', 'ASC')
            ->get()->getResult();
        return $builder;
    }

    public function getKategori2($id)
    {
        $builder = $this->db->table('tb_sarpras')
            ->select('*')
            ->join('tb_kategori', 'tb_sarpras.sarpras_kategori_id=tb_kategori.kategori_id')
            ->where('tb_sarpras.sarpras_id', $id);
        $data = $builder->get()->getRow();
        return $data;
    }

    public function saveSarpras($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editSarpras($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('sarpras_id', $id);
        return $builder->update($data);
    }

    public function hapusSarpras($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['sarpras_id' => $id]);
    }
}
