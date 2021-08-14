<?php

namespace App\Controllers;

use App\Models\JabatanModel;

class jabatan extends BaseController
{
    protected $JabatanModel;
    public function __construct()
    {
        $this->JabatanModel = new JabatanModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Tabel Jabatan',
            'Jabatan' => $this->JabatanModel->getJabatan()
        ];
        return view('Jabatan/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data Jabatan',
            'validation' => \config\Services::validation()
        ];
        return view('Jabatan/create', $data);
    }
    public function save()
    {
        $request = \Config\Services::request();

        if (!$this->validate([
            'kriteria_jabatan' => [
                'rules' => 'required|is_unique[jabatan.kriteria_jabatan]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]

            ],
            'id_jabatan' => [
                'rules' => 'required|is_unique[jabatan.id_jabatan]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]

            ],


        ])) {
            return redirect()->to('/jabatan/create')->withInput();
        }
        $id_jabatan = url_title($request->getVar('id_jabatan'), '-', true);
        $jabatan = new JabatanModel();

        $jabatan->insert([
            'id_jabatan' => $id_jabatan,
            'id_divisi' => $request->getVar('id_divisi'),
            'kriteria_jabatan' => $request->getVar('kriteria_jabatan'),
        ]);
        session()->setFlashdata('pesan', 'Data Jabatan Berhasil ditambahkan');

        return redirect()->to('/jabatan');
    }
    public function delete($id_jabatan)
    {
        $this->JabatanModel->delete($id_jabatan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/jabatan');
    }
    public function edit($id_jabatan)
    {
        $data = [
            'title' => 'Form Ubah Data Jabatan',
            'validation' => \config\Services::validation(),
            'jabatan' => $this->JabatanModel->getJabatan($id_jabatan)
        ];
        return view('jabatan/edit', $data);
    }

    public function update($id_jabatan)
    {
        $request = \Config\Services::request();

        //mengecek jabatan
        $jabatanLama = $this->JabatanModel->getJabatan($request->getVar('id_jabatan'));
        if ($jabatanLama['id_jabatan'] == $request->getVar('id_jabatan')) {
            $rule_Kriteria = 'required';
        } else {
            $rule_Kriteria = 'required|is_unique[jabatan.kriteria_jabatan]';
        }

        if (!$this->validate([
            'kriteria_jabatan' => [
                'rules' => $rule_Kriteria,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/jabatan/edit/' . $request->getVar('id_jabatan'))->withInput();
        }

        $id_jabatan = url_title($request->getVar('id_jabatan'), '-', true);
        $this->JabatanModel->save([
            'id_jabatan' => $id_jabatan,
            'id_divisi' => $request->getVar('id_divisi'),
            'kriteria_jabatan' => $request->getVar('kriteria_jabatan'),
        ]);
        session()->setFlashdata('pesan', 'Data Divisi Berhasil diubah');

        return redirect()->to('/jabatan');
    }
}
