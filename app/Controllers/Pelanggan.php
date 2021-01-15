<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{

    public function __construct()
    {
        $this->PelangganModel = new PelangganModel();
    }

    public function index($idPelanggan = '')
    {
        helper('form');
        if ($this->request->getVar()) :
            $simpan = [
                'idPelanggan' => $idPelanggan != '' ? $idPelanggan : '',
                "namaPelanggan" => $this->request->getVar('namaPelanggan'),
                "telpon" => $this->request->getVar('telpon')
            ];

            $this->PelangganModel->save($simpan);
            $idPelanggan = '';
        // dd($simpan);
        endif;

        // d($idPelanggan);
        $data = [
            'aktif' => "customer",
            'pelangganAll' => $this->PelangganModel->findAll(),
            'pelangganPilih' => $idPelanggan != '' ? $this->PelangganModel->find($idPelanggan) : ''
        ];

        echo view('home/header', $data);
        echo view('pelanggan/index', $data);
        echo view('home/footer');
    }

    public function hapus($idPelanggan = '')
    {
        echo ($idPelanggan) ? $idPelanggan : '';
        if ($this->PelangganModel->delete($idPelanggan)) :
            echo "data berhasil dihapus";
            return redirect()->to(base_url('Pelanggan'));
        else :
            echo "data gagal dihapus";
        endif;
    }
}
