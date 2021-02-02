<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{

    protected $table = "transaksi";
    protected $primaryKey = "idTransaksi";
    protected $allowedFields = ['noNota', 'tglTerima', 'tglSelesai', 'pelangganId', 'uangMuka', 'statusPesananId', 'keterangan'];

    protected $validationRules    = [
        'noNota'     => 'required|min_length[3]',
        'tglTerima' => 'required',
        'tglSelesai' => 'required',
    ];

    protected $validationMessages = [
        'noNota'        => [
            'required' => 'Sorry. nomor Nota harus diisi, tidak boleh kosong.',
            'min_length' => 'maaf kurang panjang Nomor Nota.'
        ]
    ];

    public function transaksiAll()
    {

        return $this->join('pelanggan', 'pelanggan.idPelanggan=transaksi.pelangganId', 'right')
            ->join('statusPesanan', 'statusPesanan.idStatusPesanan=transaksi.statusPesananId')
            ->findAll();
    }

    public function transaksiAllbyId($idTransaksi)
    {

        return $this->join('pelanggan', 'pelanggan.idPelanggan=transaksi.pelangganId', 'right')
            ->join('statusPesanan', 'statusPesanan.idStatusPesanan=transaksi.statusPesananId')
            ->find($idTransaksi);
    }

    public function transaksiPesananAll()
    {
        return $this->join('pelanggan', 'pelanggan.idPelanggan=transaksi.pelangganId', 'right')
            ->join('statusPesanan', 'statusPesanan.idStatusPesanan=transaksi.statusPesananId')
            ->join('(select *, pesanan.hargaPesanan * pesanan.jumlah as jmlTiapBarang from pesanan) as jmlTransaksi','jmlTransaksi.transaksiId = transaksi.idTransaksi','left',false)
            ->select('*')
            ->selectSum('jmlTransaksi.jmlTiapBarang', 'hargaTotal')
            ->groupBy('transaksi.idTransaksi')
            ->findAll();
    }
}
