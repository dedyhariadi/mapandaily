<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{

    protected $table = "transaksi";
    protected $primaryKey = "idTransaksi";
    protected $allowedFields = ['noNota', 'tglTerima', 'tglSelesai', 'pelangganId', 'uangMuka', 'statusPesananId', 'keterangan'];

    public function transaksiAll()
    {
        // select count(*) as bnykmaterialambil,id_ambil,mutasiBarang_id from ambil left join trx_ambil on id_ambil=ambil_id group by id_ambil

        return $this->join('pelanggan', 'pelanggan.idPelanggan=transaksi.pelangganId', 'right')
            ->join('statusPesanan', 'statusPesanan.idStatusPesanan=transaksi.statusPesananId')
            ->select('*')
            //         ->selectCount('*', 'banyakMaterial')
            //         ->groupBy('id_ambil')
            //         ->where('mutasiBarang_id', $idMutasiBarang)
            ->findAll();
    }
}
