<?php

namespace App\Controllers;

use App\Models\TunjanganModel;

class tunjangan extends BaseController
{
    protected $TunjanganModel;
    public function __construct()
    {
        $this->TunjanganModel = new TunjanganModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Tabel Tunjangan',
            'Tunjangan' => $this->TunjanganModel->getTunjangan()
        ];
        return view('Tunjangan/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data Tunjangan',
            'validation' => \config\Services::validation()
        ];
        return view('Tunjangan/create', $data);
    }
    public function save()
    {
        $request = \Config\Services::request();

        if (!$this->validate([
            'id_tunjangan' => [
                'rules' => 'required|is_unique[tunjangan.id_tunjangan]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]

            ],
            'jenis_tunjangan' => [
                'rules' => 'required|is_unique[tunjangan.jenis_tunjangan]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/tunjangan/create')->withInput();
        }
        $id_tunjangan = url_title($request->getVar('id_tunjangan'), '-', true);
        $tunjangan = new TunjanganModel();

        $tunjangan->insert([
            'id_tunjangan' => $id_tunjangan,
            'id_pegawai' => $request->getVar('id_pegawai'),
            'jenis_tunjangan' => $request->getVar('jenis_tunjangan')
        ]);
        session()->setFlashdata('pesan', 'Data Tunjangan Berhasil ditambahkan');

        return redirect()->to('/tunjangan');
    }
    public function delete($id_tunjangan)
    {
        $this->TunjanganModel->delete($id_tunjangan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/tunjangan');
    }
    public function edit($id_tunjangan)
    {
        $data = [
            'title' => 'Form Ubah Data Tunjangan',
            'validation' => \config\Services::validation(),
            'tunjangan' => $this->TunjanganModel->getTunjangan($id_tunjangan)
        ];
        return view('tunjangan/edit', $data);
    }

    public function update($id_tunjangan)
    {
        $request = \Config\Services::request();

        //mengecek divisi
        $tunjanganLama = $this->TunjanganModel->getTunjangan($request->getVar('id_tunjangan'));
        if ($tunjanganLama['id_tunjangan'] == $request->getVar('id_tunjangan')) {
            $rule_jenis_tunjangan = 'required';
        } else {
            $rule_jenis_tunjangan = 'required|is_unique[tunjangan.jenis_tunjangan]';
        }

        if (!$this->validate([
            'jenis_tunjangan' => [
                'rules' => $rule_jenis_tunjangan,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/tunjangan/edit/' . $request->getVar('id_tunjangan'))->withInput();
        }

        $id_tunjangan = url_title($request->getVar('id_tunjangan'), '-', true);
        $this->TunjanganModel->save([
            'id_tunjangan' => $id_tunjangan,
            'id_pegawai' => $request->getVar('id_pegawai'),
            'jenis_tunjangan' => $request->getVar('jenis_tunjangan')
        ]);
        session()->setFlashdata('pesan', 'Data Tunjangan Berhasil diubah');

        return redirect()->to('/tunjangan');
    }
}
