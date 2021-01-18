<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{

    protected $table = "pesanan";
    protected $primaryKey = "idPesanan";
    protected $allowedFields = ['transaksiId', 'barangId', 'jumlah', 'hargaPesanan', 'keterangan'];

    public function pesananAll()
    {
        return $this->join('barang', 'barang.idBarang=pesanan.barangId', 'right')
            // ->join('statusPesanan', 'statusPesanan.idStatusPesanan=transaksi.statusPesananId')
            ->findAll();
    }
}
