<?php

namespace App\Controllers;

use App\Models\DivisiModel;

class divisi extends BaseController
{
    protected $DivisiModel;
    public function __construct()
    {
        $this->DivisiModel = new DivisiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Tabel Divisi',
            'Divisi' => $this->DivisiModel->getDivisi()
        ];
        return view('Divisi/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data Divisi',
            'validation' => \config\Services::validation()
        ];
        return view('Divisi/create', $data);
    }
    public function save()
    {
        $request = \Config\Services::request();

        if (!$this->validate([
            'nama_divisi' => [
                'rules' => 'required|is_unique[divisi.nama_divisi]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]

            ],
            'id_divisi' => [
                'rules' => 'required|is_unique[divisi.id_divisi]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/divisi/create')->withInput();
        }
        $id_divisi = url_title($request->getVar('id_divisi'), '-', true);
        $divisi = new DivisiModel();

        $divisi->insert([
            'id_divisi' => $id_divisi,
            'nama_divisi' => $request->getVar('nama_divisi'),
        ]);
        session()->setFlashdata('pesan', 'Data Divisi Berhasil ditambahkan');

        return redirect()->to('/divisi');
    }
    public function delete($id_divisi)
    {
        $this->DivisiModel->delete($id_divisi);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/divisi');
    }
    public function edit($id_divisi)
    {
        $data = [
            'title' => 'Form Ubah Data Divisi',
            'validation' => \config\Services::validation(),
            'divisi' => $this->DivisiModel->getDivisi($id_divisi)
        ];
        return view('divisi/edit', $data);
    }

    public function update($id_divisi)
    {
        $request = \Config\Services::request();

        //mengecek divisi
        $divisiLama = $this->DivisiModel->getDivisi($request->getVar('id_divisi'));
        if ($divisiLama['id_divisi'] == $request->getVar('id_divisi')) {
            $rule_Nama_divisi = 'required';
        } else {
            $rule_Nama_divisi = 'required|is_unique[divisi.nama_divisi]';
        }

        if (!$this->validate([
            'nama_divisi' => [
                'rules' => $rule_Nama_divisi,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/divisi/edit/' . $request->getVar('id_divisi'))->withInput();
        }

        $id_divisi = url_title($request->getVar('id_divisi'), '-', true);
        $this->DivisiModel->save([
            'id_divisi' => $id_divisi,
            'nama_divisi' => $request->getVar('nama_divisi'),
        ]);
        session()->setFlashdata('pesan', 'Data Divisi Berhasil diubah');

        return redirect()->to('/divisi');
    }
}
