<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('home/header');
		echo view('home/index');
		echo view('home/footer');
	}
}
