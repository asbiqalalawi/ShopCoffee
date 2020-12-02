<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function login()
	{
		$data = [
			'title' => 'Login | Kopi Lampung'
		];
		return view('kopi/login', $data);
	}

	public function signup()
	{
		$data = [
			'title' => 'Sign Up | Kopi Lampung'
		];
		return view('kopi/signup', $data);
	}
}
