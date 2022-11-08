<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\PelangganModel;
use App\Models\BarangModel;
use App\Models\PesananModel;

class Transaksi extends BaseController
{

    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->PelangganModel = new PelangganModel();
        $this->BarangModel = new BarangModel();
        $this->PesananModel = new PesananModel();
    }

    public function index($idTransaksi = '')
    {
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
            $this->TransaksiModel->save($simpan);
        endif;
// die;
        $data = [
            'aktif' => "transaksi",
            // 'transaksiAll' => $this->TransaksiModel->transaksiAll(),
            'transaksiAll' => $this->TransaksiModel->transaksiPesananAll()
        ];
       d($data);
        echo view('home/header', $data);
        echo view('transaksi/index', $data);
        echo view('home/footer');
    }

    public function hapus($idTransaksi = '')
    {
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

    public function addpesanan()
    {
        $data = [
            'aktif' => "transaksi",
            'listPelanggan' => $this->PelangganModel->findAll(),
            'listBarang' => $this->BarangModel->findAll(),
        ];


        if ($this->request->getVar('origin')) :

            $tglSelesai = $this->request->getVar('tglSelesai');
            $tglTerima = $this->request->getVar('tglTerima');
            $tglSelesaiSimpan = tglSimpan($tglSelesai);
            $tglTerimaSimpan = tglSimpan($tglTerima);
            $idPelanggan = $this->request->getVar('pelanggan');

            $simpan = [
                'noNota' => $this->request->getVar('noNota'),
                "tglTerima" => $tglTerimaSimpan,
                "tglSelesai" => $tglSelesaiSimpan,
                "pelangganId" => $idPelanggan,
                "uangMuka" => $this->request->getVar('uangMuka'),
                "statusPesananId" => "1",
                "keterangan" => $this->request->getVar('keterangan'),
            ];
            if (!$this->TransaksiModel->save($simpan)) :
                dd($this->TransaksiModel->errors());
            endif;

            $idTransaksi = $this->TransaksiModel->insertID();

        else :
            // d($this->request->getVar());
            $idTransaksi = $this->request->getVar('idTransaksi');
            $data += [
                'aktif' => "transaksi",
                'transaksiAll' => $this->TransaksiModel->transaksiAllbyId($idTransaksi)
            ];

            $simpanPesanan = [
                'transaksiId' => $idTransaksi,
                'barangId' => $this->request->getVar('idBarang'),
                'jumlah' => $this->request->getVar('jumlah'),
                'hargaPesanan' => $this->request->getVar('hargaSatuan'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            
            if (!$this->PesananModel->save($simpanPesanan)) :
                echo "gagal menyimpan";
                die;
            endif;

            $data += [
                "listPesanan" => $this->PesananModel->where('transaksiId', $idTransaksi)->pesananAll()
            ];


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

    public function hapusPesanan($idPesanan, $idTransaksi)
    {
        // dd($idTransaksi, $idPesanan);
        if ($this->PesananModel->delete($idPesanan)) :
            echo "data berhasil dihapus";
            return redirect()->to(base_url('transaksi/addpesanan') . '?idTransaksi=' . $idTransaksi);
        else :
            echo "data gagal dihapus";
        endif;
    }



    //--------------------------------------------------------------------

}
