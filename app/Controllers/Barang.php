<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{

	public function __construct()
	{
		$this->BarangModel = new BarangModel();
	}

	public function index($idBarang = '')
	{

		if ($this->request->getVar()) :
			$simpan = [
				'idBarang' => $idBarang != '' ? $idBarang : '',
				"namaBarang" => $this->request->getVar('namaBarang'),
				"hargaBarang" => $this->request->getVar('hargaBarang')
			];

			if (!$this->BarangModel->save($simpan)) :
				echo "gagal menyimpan";
				die;
			endif;

			$idBarang = '';
		endif;

		$data = [
			'aktif' => "produk",
			'barangAll' => $this->BarangModel->findAll(),
			'barangPilih' => $idBarang != '' ? $this->BarangModel->find($idBarang) : ''
		];

		echo view('home/header', $data);
		echo view('barang/index', $data);
		echo view('home/footer');
	}

	public function hapus($idBarang = '')
	{
		echo ($idBarang) ? $idBarang : '';
		if ($this->BarangModel->delete($idBarang)) :
			echo "data berhasil dihapus";
			return redirect()->to(base_url('barang'));
		else :
			echo "data gagal dihapus";
		endif;
	}
}
