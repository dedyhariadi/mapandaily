<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{

    protected $table = "barang";
    protected $primaryKey = "idBarang";
    protected $allowedFields = ['namaBarang', 'harga'];

    // public function banyakMaterial($idMutasiBarang)
    // {
    //     // select count(*) as bnykmaterialambil,id_ambil,mutasiBarang_id from ambil left join trx_ambil on id_ambil=ambil_id group by id_ambil

    //     return $this->join('trx_ambil', 'trx_ambil.ambil_id=ambil.id_ambil', 'left')
    //         ->select('*')
    //         ->selectCount('*', 'banyakMaterial')
    //         ->groupBy('id_ambil')
    //         ->where('mutasiBarang_id', $idMutasiBarang)
    //         ->findAll();
    // }
}
