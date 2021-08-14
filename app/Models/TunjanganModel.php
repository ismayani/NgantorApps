<?php

namespace App\Models;

use CodeIgniter\Model;

class TunjanganModel extends Model
{
    protected $table = 'tunjangan';
    protected $primaryKey = 'id_tunjangan';

    protected $allowedFields = ['id_tunjangan', 'id_pegawai', 'jenis_tunjangan'];
    public function getTunjangan($id_tunjangan = false)
    {
        if ($id_tunjangan == false) {
            return $this->findAll();
        }
        return $this->where(['id_tunjangan' => $id_tunjangan])->first();
    }
}
