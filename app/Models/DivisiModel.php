<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisiModel extends Model
{
    protected $table = 'divisi';
    protected $primaryKey = 'id_divisi';

    protected $allowedFields = ['id_divisi', 'nama_divisi'];
    public function getDivisi($id_divisi = false)
    {
        if ($id_divisi == false) {
            return $this->findAll();
        }
        return $this->where(['id_divisi' => $id_divisi])->first();
    }
}
