<?php

namespace App\Controllers;

use App\Models\DivisiModel;
use App\Models\JabatanModel;
use App\Models\KepegawaianModel;

class Pages extends BaseController
{
    protected $DivisiModel;
    protected $JabatanModel;
    protected $KepegawaianModel;

    public function __construct()
    {
        $this->KepegawaianModel = new KepegawaianModel();
        $this->JabatanModel = new JabatanModel();
        $this->DivisiModel = new DivisiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home | PT. Garmen Sejahtera',
            'pegawai' => $this->KepegawaianModel->getKepegawaian(),
            'jabatan' => $this->JabatanModel->getJabatan(),
            'divisi' => $this->DivisiModel->getDivisi(),
        ];

        return view('Pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Us | PT. Garmen Sejahtera'
        ];

        return view('Pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact'

        ];
        return view('Pages/contact', $data);
    }
}
