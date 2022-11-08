<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{

    protected $table = "barang";
    protected $primaryKey = "idBarang";
    protected $allowedFields = ['namaBarang', 'hargaBarang'];