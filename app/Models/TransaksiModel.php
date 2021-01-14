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
        'email'        => 'required|valid_email|is_unique[users.email]',
        'password'     => 'required|min_length[8]',
        'pass_confirm' => 'required_with[password]|matches[password]'
    ];

    protected $validationMessages = [
        'noNota'        => [
            'required' => 'Sorry. nomor Nota harus diisi, tidak boleh kosong.',
            'min_length' => 'maaf kurang panjang.'
        ]
    ];

    public function transaksiAll()
    {

        return $this->join('pelanggan', 'pelanggan.idPelanggan=transaksi.pelangganId', 'right')
            ->join('statusPesanan', 'statusPesanan.idStatusPesanan=transaksi.statusPesananId')
            ->findAll();
    }
}
