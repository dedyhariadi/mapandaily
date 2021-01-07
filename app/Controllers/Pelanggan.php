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
        echo "sukses";
        // die;
        if ($this->request->getVar()) :
            $simpan = [
                'idPelanggan' => $idPelanggan != '' ? $idPelanggan : '',
                "namaPelanggan" => $this->request->getVar('namaPelanggan'),
                "telpon" => $this->request->getVar('telpon')
            ];

            // d($simpan);
            $this->PelangganModel->save($simpan);
            $idPelanggan = '';
        endif;

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

    //--------------------------------------------------------------------

}
