<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tb_user';
    protected $allowedFields = ['user_id' . 'user_name', 'user_email', 'user_image', 'user_password', 'user_notelp', 'user_role_id', 'user_is_active', 'user_date_created'];


    public function Jumlah()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['user_id' => $id]);
        }
    }

    public function getUser_id()
    {
        $builder = $this->db->table('tb_user')
            ->select('user_id')
            ->orderBy('user_id', 'DESC')
            ->limit(1)
            ->get()->getRow();
        return $builder;
    }

    public function getOptionRole()
    {
        $builder = $this->db->table('tb_user_role')
            ->select('*')->get()->getResult();
        return $builder;
    }

    public function getRole()
    {
        $builder = $this->db->table('tb_user')
            ->select('*')
            ->join('tb_user_role', 'tb_user.user_role_id=tb_user_role.role_id')
            ->orderBy('tb_user_role.role_name')
            ->get()->getResult();
        return $builder;
    }

    public function getSebagai($id)
    {
        $builder = $this->db->table('tb_user')
            ->select('*')
            ->join('tb_user_role', 'tb_user.user_role_id=tb_user_role.role_id')
            ->where('tb_user.user_id', $id);
        $data = $builder->get()->getRow();
        return $data;
    }

    public function saveUser($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editUser($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('user_id', $id);
        return $builder->update($data);
    }

    public function hapusUser($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['user_id' => $id]);
    }
}
