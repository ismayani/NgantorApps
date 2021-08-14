<?php

namespace App\Controllers;

use App\Models\KepegawaianModel;

class kepegawaian extends BaseController
{
    protected $KepegawaianModel;
    public function __construct()
    {
        $this->KepegawaianModel = new KepegawaianModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Tabel Pegawai',
            'Kepegawaian' => $this->KepegawaianModel->getKepegawaian()
        ];
        return view('Kepegawaian/index', $data);
    }
    public function detail($slug_nama)
    {
        $data = [
            'title' => 'Detail Pegawai',
            'Kepegawaian' => $this->KepegawaianModel->getKepegawaian($slug_nama),
        ];
        //jika gaada di tabel
        if (empty($data['Kepegawaian'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pegawai ' . $slug_nama . ' tidak ditemukan.');
        }
        return view('Kepegawaian/detail', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data Pegawai',
            'validation' => \config\Services::validation()
        ];
        return view('Kepegawaian/create', $data);
    }
    public function save()
    {
        $request = \Config\Services::request();

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[pegawai.nama]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]

            ],
            'id_pegawai' => [
                'rules' => 'required|is_unique[pegawai.id_pegawai]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/kepegawaian/create')->withInput();
        }
        $slug_nama = url_title($request->getVar('nama'), '-', true);
        $pegawai = new KepegawaianModel();

        $pegawai->insert([
            'id_pegawai' => $request->getVar('id_pegawai'),
            'nama' => $request->getVar('nama'),
            'slug_nama' => $slug_nama,
            'TTL' => $request->getVar('TTL'),
            'jenis_kelamin' => $request->getVar('jenis_kelamin'),
            'telepon' => $request->getVar('telepon'),
            'id_jabatan' => $request->getVar('id_jabatan'),
            'Alamat' => $request->getVar('Alamat'),
            'status' => $request->getVar('status'),
            'jumlah_anak' => $request->getVar('jumlah_anak')

        ]);
        session()->setFlashdata('pesan', 'Data Pegawai Berhasil ditambahkan');

        return redirect()->to('/kepegawaian');
    }
    public function delete($id_pegawai)
    {
        $this->KepegawaianModel->delete($id_pegawai);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/kepegawaian');
    }
    public function edit($slug_nama)
    {
        $data = [
            'title' => 'Form Ubah Data Pegawai',
            'validation' => \config\Services::validation(),
            'pegawai' => $this->KepegawaianModel->getKepegawaian($slug_nama)
        ];
        return view('kepegawaian/edit', $data);
    }

    public function update($id_pegawai)
    {
        $request = \Config\Services::request();

        //mengecek pegawai
        $pegawaiLama = $this->KepegawaianModel->getKepegawaian($request->getVar('slug_nama'));
        if ($pegawaiLama['nama'] == $request->getVar('nama')) {
            $rule_Nama_Pegawai = 'required';
        } else {
            $rule_Nama_Pegawai = 'required|is_unique[pegawai.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_Nama_Pegawai,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/kepegawaian/edit/' . $request->getVar('slug_nama'))->withInput();
        }

        $slug_nama = url_title($request->getVar('nama'), '-', true);
        $this->KepegawaianModel->save([
            'id_pegawai' => $id_pegawai,
            'slug_nama' => $slug_nama,
            'nama' => $request->getVar('nama'),
            'TTL' => $request->getVar('TTL'),
            'jenis_kelamin' => $request->getVar('jenis_kelamin'),
            'telepon' => $request->getVar('telepon'),
            'id_jabatan' => $request->getVar('id_jabatan'),
            'Alamat' => $request->getVar('Alamat'),
            'status' => $request->getVar('status'),
            'jumlah_anak' => $request->getVar('jumlah_anak')

        ]);
        session()->setFlashdata('pesan', 'Data Pegawai Berhasil diubah');

        return redirect()->to('/kepegawaian');
    }
}
