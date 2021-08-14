<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';

    protected $allowedFields = ['id_jabatan', 'id_divisi', 'kriteria_jabatan'];
    public function getJabatan($id_jabatan = false)
    {
        if ($id_jabatan == false) {
            return $this->findAll();
        }
        return $this->where(['id_jabatan' => $id_jabatan])->first();
    }
}
