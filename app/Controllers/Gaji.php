<?php

namespace App\Controllers;

use App\Models\GajiModel;

class gaji extends BaseController
{
    protected $GajiModel;
    public function __construct()
    {
        $this->GajiModel = new GajiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Tabel Gaji',
            'Gaji' => $this->GajiModel->getGaji()
        ];
        return view('Gaji/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data Gaji',
            'validation' => \config\Services::validation()
        ];
        return view('Gaji/create', $data);
    }
    public function save()
    {
        $request = \Config\Services::request();

        if (!$this->validate([
            'id_gaji' => [
                'rules' => 'required|is_unique[gaji.id_gaji]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
        ])) {
            return redirect()->to('/gaji/create')->withInput();
        }
        $id_gaji = url_title($request->getVar('id_gaji'), '-', true);
        $gaji = new GajiModel();

        $gaji->insert([
            'id_gaji' => $id_gaji,
            'id_pegawai' => $request->getVar('id_pegawai'),
            'id_tunjangan' => $request->getVar('id_tunjangan'),
            'gaji_pokok' => $request->getVar('gaji_pokok'),
            'tunjangan' => $request->getVar('tunjangan')
        ]);
        session()->setFlashdata('pesan', 'Data Gaji Berhasil ditambahkan');

        return redirect()->to('/gaji');
    }
    public function delete($id_gaji)
    {
        $this->GajiModel->delete($id_gaji);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/gaji');
    }
    public function edit($id_gaji)
    {
        $data = [
            'title' => 'Form Ubah Data Gaji',
            'validation' => \config\Services::validation(),
            'gaji' => $this->GajiModel->getGaji($id_gaji)
        ];
        return view('gaji/edit', $data);
    }

    public function update($id_gaji)
    {
        $request = \Config\Services::request();

        //mengecek gaji
        $gajiLama = $this->GajiModel->getGaji($request->getVar('id_gaji'));
        if ($gajiLama['id_gaji'] == $request->getVar('id_gaji')) {
            $rule_Nama_gaji = 'required';
        } else {
            $rule_Nama_gaji = 'required|is_unique[gaji.gaji_pokok]';
        }

        if (!$this->validate([
            'gaji_pokok' => [
                'rules' => $rule_Nama_gaji,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/gaji/edit/' . $request->getVar('id_gaji'))->withInput();
        }

        $id_gaji = url_title($request->getVar('id_gaji'), '-', true);
        $this->GajiModel->save([
            'id_gaji' => $id_gaji,
            'id_pegawai' => $request->getVar('nama_gaji'),
            'id_tunjangan' => $request->getVar('nama_gaji'),
            'gaji_pokok' => $request->getVar('nama_gaji'),
            'tunjangan' => $request->getVar('tunjangan')
        ]);
        session()->setFlashdata('pesan', 'Data Gaji Berhasil diubah');

        return redirect()->to('/gaji');
    }
}
