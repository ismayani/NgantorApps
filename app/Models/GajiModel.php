<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $table = 'gaji';
    protected $primaryKey = 'id_gaji';

    protected $allowedFields = ['id_gaji', 'id_pegawai', 'id_tunjangan', 'gaji_pokok', 'tunjangan'];
    public function getGaji($id_gaji = false)
    {
        if ($id_gaji == false) {
            return $this->findAll();
        }
        return $this->where(['id_gaji' => $id_gaji])->first();
    }
}
