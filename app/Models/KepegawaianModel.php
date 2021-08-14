<?php

namespace App\Models;

use CodeIgniter\Model;

class KepegawaianModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $allowedFields = ['id_pegawai', 'nama', 'slug_nama', 'TTL', 'jenis_kelamin', 'telepon', 'id_jabatan', 'Alamat', 'status', 'jumlah_anak'];
    public function getKepegawaian($slug_nama = false)
    {
        if ($slug_nama == false) {
            return $this->findAll();
        }
        return $this->where(['slug_nama' => $slug_nama])->first();
    }
}
