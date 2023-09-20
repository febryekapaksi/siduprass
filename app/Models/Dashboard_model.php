<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function hitungUser()
    {
        $query = $this->db->getConnection('tb_user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
