<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{

    protected $table = "transaksi";
    protected $primaryKey = "idTransaksi";
    protected $allowedFields = ['noNota', 'tglTerima', 'tglSelesai', 'pelangganId', 'uangMuka', 'statusPesananId', 'keterangan'];

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
