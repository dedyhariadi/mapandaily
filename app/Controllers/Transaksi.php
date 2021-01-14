<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\PelangganModel;
use App\Models\BarangModel;

class Transaksi extends BaseController
{

    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->PelangganModel = new PelangganModel();
        $this->BarangModel = new BarangModel();
    }

    public function index($idTransaksi = '')
    {
        helper('form');
        echo "sukses";
        // die;
        if ($this->request->getVar()) :
            $simpan = [
                'idTransaksi' => $idTransaksi != '' ? $idTransaksi : '',
                "tglTerima" => $this->request->getVar('tglTerima'),
                "tglSelesai" => $this->request->getVar('tglSelesai'),
                "pelangganId" => $this->request->getVar('pelangganId'),
                "uangMuka" => $this->request->getVar('uangMuka'),
                "statusPesananId" => $this->request->getVar('statusPesananId'),
                "keterangan" => $this->request->getVar('keterangan'),
            ];

            // d($simpan);
            $this->TransaksiModel->save($simpan);
            $idTransaksi = '';
        endif;

        $data = [
            'aktif' => "transaksi",
            'transaksiAll' => $this->TransaksiModel->transaksiAll(),
            // 'pelangganPilih' => $idTransaksi != '' ? $this->TransaksiModel->find($idTransaksi) : ''
        ];

        echo view('home/header', $data);
        echo view('transaksi/index', $data);
        echo view('home/footer');
    }

    public function hapus($idTransaksi = '')
    {
        echo ($idTransaksi) ? $idTransaksi : '';
        if ($this->TransaksiModel->delete($idTransaksi)) :
            echo "data berhasil dihapus";
            return redirect()->to(base_url('transaksi'));
        else :
            echo "data gagal dihapus";
        endif;
    }

    public function addtransaksi()
    {
        $data = [
            'aktif' => "transaksi",
            'listPelanggan' => $this->PelangganModel->findAll()
        ];
        echo view('home/header', $data);
        echo view('transaksi/addTransaksi', $data);
        echo view('home/footer');
    }

    public function addpesanan($idTransaksi = '')
    {
        $data = [
            'aktif' => "transaksi",
            'listPelanggan' => $this->PelangganModel->findAll(),
            'listBarang' => $this->BarangModel->findAll(),
        ];

        helper('fungsiku');

        if ($this->request->getVar('origin')) :

            $tglSelesai = $this->request->getVar('tglSelesai');
            $tglTerima = $this->request->getVar('tglTerima');
            $tglSelesaiSimpan = tglSimpan($tglSelesai);
            $tglTerimaSimpan = tglSimpan($tglTerima);
            $idPelanggan = $this->request->getVar('pelanggan');

            $simpan = [
                'idTransaksi' => $idTransaksi != '' ? $idTransaksi : '',
                'noNota' => $this->request->getVar('noNota'),
                "tglTerima" => $tglTerimaSimpan,
                "tglSelesai" => $tglSelesaiSimpan,
                "pelangganId" => $idPelanggan,
                "uangMuka" => $this->request->getVar('uangMuka'),
                "statusPesananId" => "1",
                "keterangan" => $this->request->getVar('keterangan'),
            ];
            $this->TransaksiModel->save($simpan);

            $idTransaksi = $idTransaksi == '' ? $this->TransaksiModel->insertID() : $idTransaksi;


        else :

        // dari halaman add pesan

        endif;

        $tampilTrax = $this->TransaksiModel->find($idTransaksi);
        $pelanggan = $idTransaksi != '' ? $this->PelangganModel->find($tampilTrax['pelangganId']) : '';
        $data += [
            'tampilTransaksi' => $tampilTrax,
            'pelanggan' => $pelanggan
        ];

        echo view('home/header', $data);
        echo view('transaksi/addPesanan', $data);
        echo view('home/footer');
    }



    //--------------------------------------------------------------------

}
