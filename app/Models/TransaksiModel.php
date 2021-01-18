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
        return $this->join('pesanan', 'transaksi.idTransaksi=pesanan.transaksiId', 'left')
            ->join('pelanggan', 'pelanggan.idPelanggan=transaksi.pelangganId', 'right')
            ->join('statusPesanan', 'statusPesanan.idStatusPesanan=transaksi.statusPesananId')
            ->select('*')
            ->selectSum('hargaPesanan', 'hargaTotal')
            ->groupBy('transaksi.idTransaksi')
            ->findAll();
    }
}
