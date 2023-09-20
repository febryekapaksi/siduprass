<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan_model extends Model
{
    protected $table = 'tb_pengaduan';
    protected $allowedFields = ['pengaduan_id', 'pengaduan_warga_id', 'pengaduan_kategori_id', 'pengaduan_sarpras_id', 'pengaduan_petugas_id', 'pengaduan_isi', 'pengaduan_foto', 'pengaduan_lng', 'pengaduan_lat', 'pengaduan_status', 'created_at', 'updated_at'];

    public function Jumlah()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getPengaduan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['pengaduan_id' => $id]);
        }
    }

    public function getPengaduantoBeranda()
    {
        $builder = $this->db->table('tb_pengaduan')
            ->select('*')
            ->join('tb_warga', 'tb_pengaduan.pengaduan_warga_id=tb_warga.warga_id')
            ->join('tb_kategori', 'tb_pengaduan.pengaduan_kategori_id=tb_kategori.kategori_id')
            ->join('tb_sarpras', 'tb_pengaduan.pengaduan_sarpras_id=tb_sarpras.sarpras_id')
            ->orderBy('pengaduan_id', 'DESC')
            ->getWhere(["pengaduan_status <>" => 'Ditolak'])
            ->getResult();

        return $builder;
    }

    public function getData()
    {
        $builder = $this->db->table('tb_pengaduan')
            ->select('*')
            ->join('tb_warga', 'tb_pengaduan.pengaduan_warga_id=tb_warga.warga_id')
            ->join('tb_kategori', 'tb_pengaduan.pengaduan_kategori_id=tb_kategori.kategori_id')
            ->join('tb_sarpras', 'tb_pengaduan.pengaduan_sarpras_id=tb_sarpras.sarpras_id')
            ->orderBy('tb_warga.warga_nama', 'tb_kategori.kategori_nama', 'tb_sarpras.sarpras_nama', 'ASC')
            ->get()->getResult();
        return $builder;
    }

    public function getPengaduanWarga($id)
    {
        $builder = $this->db->table('tb_pengaduan')
            ->select('*')
            ->join('tb_warga', 'tb_pengaduan.pengaduan_warga_id=tb_warga.warga_id')
            ->join('tb_kategori', 'tb_pengaduan.pengaduan_kategori_id=tb_kategori.kategori_id')
            ->join('tb_sarpras', 'tb_pengaduan.pengaduan_sarpras_id=tb_sarpras.sarpras_id')
            ->where('tb_pengaduan.pengaduan_warga_id', $id);
        $data = $builder->get()->getResult();
        return $data;
    }

    public function getDetail($id)
    {
        $builder = $this->db->table('tb_pengaduan')
            ->select('*')
            ->join('tb_warga', 'tb_pengaduan.pengaduan_warga_id=tb_warga.warga_id')
            ->join('tb_kategori', 'tb_pengaduan.pengaduan_kategori_id=tb_kategori.kategori_id')
            ->join('tb_sarpras', 'tb_pengaduan.pengaduan_sarpras_id=tb_sarpras.sarpras_id')
            ->where('tb_pengaduan.pengaduan_id', $id);
        $data = $builder->get()->getRow();
        return $data;
    }

    public function savePengaduan($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editPengaduan($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('pengaduan_id', $id);
        return $builder->update($data);
    }

    public function hapusPengaduan($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['pengaduan_id' => $id]);
    }

    public function get_sarpras($id)
    {
        $builder = $this->db->table('tb_sarpras')
            ->select('*')
            ->join('tb_kategori', 'tb_kategori.kategori_id=tb_sarpras.sarpras_kategori_id')
            ->where('sarpras_kategori_id', $id)
            ->get()->getResult();
        return $builder;
    }
}
