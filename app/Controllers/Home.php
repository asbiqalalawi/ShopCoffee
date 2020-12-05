<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Files\Exceptions\FileNotFoundException;

class Home extends BaseController
{
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new UserModel();
	}

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
			'title' => 'Sign Up | Kopi Lampung',
			'validation' => \Config\Services::validation()
		];
		return view('kopi/signup', $data);
	}

	public function register()
	{
		//Validasi
		if (!$this->validate([
			'username' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi.'
				]
			],
			'email' => [
				'rules' => 'required|valid_email|is_unique[user.email]',
				'errors' => [
					'required' => 'Email harus diisi.',
					'valid_email' => 'Format email tidak valid.',
					'is_unique' => 'Email sudah terdaftar.'
				]
			],
			'password1' => [
				'rules' => 'required|matches[password2]|min_length[4]',
				'errors' => [
					'required' => 'Password harus diisi.',
					'matches' => 'Password tidak cocok.',
					'min_length' => 'Password harus lebih dari 4 karakter.'
				]

			],
			'password2' => [
				'rules' => 'required|matches[password1]|min_length[4]',
				'errors' => [
					'required' => 'Password harus diisi',
					'matches' => 'Password tidak cocok.',
					'min_length' => 'Password harus lebih dari 4 karakter.'
				]

			]
		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/Kopi/create')->withInput()->with('validation', $validation);
			return redirect()->to('/home/signup')->withInput();
		}

		$this->userModel->save([
			'username' => $this->request->getVar('username'),
			'email' => $this->request->getVar('email'),
			'image' => 'default.jpg',
			'password' => $this->request->getVar('password1'),
			'role_id' => 1,
			'is_active' => 1,
			'date_created' => Time::now()


		]);

		session()->setFlashData('message', 'Berhasil membuat akun.');

		return redirect()->to('/home/login');
	}
}
