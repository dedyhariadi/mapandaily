<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['aktif'] = 'home';
		echo view('home/header', $data);
		echo view('home/index');
		echo view('home/footer');
	}
}
