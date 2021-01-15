<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{

    protected $table = "pesanan";
    protected $primaryKey = "idPesanan";
    protected $allowedFields = ['transaksiId', 'barangId', 'jumlah', 'harga', 'keterangan'];
}
