<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\PelangganModel;
use App\Models\BarangModel;
use App\Models\PesananModel;

class Laporan extends BaseController
{

    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->PelangganModel = new PelangganModel();
        $this->BarangModel = new BarangModel();
        $this->PesananModel = new PesananModel();
    }

    public function index()
    {
    echo "laporan ";
    }
}
