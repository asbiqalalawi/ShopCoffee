<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Files\Exceptions\FileNotFoundException;
use Kint\Renderer\RichRenderer;

class Home extends BaseController
{
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new UserModel();
	}

	public function login()
	{
		if (session()->get('logged_in')) {
			if (session()->get('role_id') == 1) {
				return redirect()->to('/kopi');
			} else {
				return redirect()->to('/user');
			}
		}

		$data = [
			'title' => 'Login | Kopi Lampung',
			'validation' => \Config\Services::validation()
		];
		return view('kopi/login', $data);
	}

	public function loggedin()
	{
		//Validasi login
		if (!$this->validate([
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email harus diisi.',
					'valid_email' => 'Format email tidak valid.',
				]
			],
			'password' => [
				'rules' => 'required|min_length[4]',
				'errors' => [
					'required' => 'Password harus diisi.',
					'min_length' => 'Password harus lebih dari 4 karakter.'
				]

			]
		])) {
			return redirect()->to('/home/login')->withInput();
		}

		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		$user = $this->userModel->where('email', $email)->first();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'username' => $user['username'],
						'image' => $user['image'],
						'role_id' => $user['role_id'],
						'logged_in' => TRUE
					];
					session()->set($data);
					if ($user['role_id'] == 1) {
						return redirect()->to('/kopi');
					} else {
						return redirect()->to('/user');
					}
				} else {
					session()->setFlashData('message', '<div class="alert alert-danger" role="alert">Password yang Anda masukkan salah!</div>');
					return redirect()->to('/home/login');
				}
			} else {
				session()->setFlashData('message', '<div class="alert alert-danger" role="alert">Email belum diaktivasi.</div>');
				return redirect()->to('/home/login');
			}
		} else {
			session()->setFlashData('message', '<div class="alert alert-danger" role="alert">Email Anda belum terdaftar.</div>');
			return redirect()->to('/home/login');
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/home/login');
	}

	public function signup()
	{
		if (session()->get('logged_in')) {
			if (session()->get('role_id') == 1) {
				return redirect()->to('/kopi');
			} else {
				return redirect()->to('/user');
			}
		}

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
			return redirect()->to('/home/signup')->withInput();
		}

		$this->userModel->save([
			'username' => $this->request->getVar('username'),
			'email' => $this->request->getVar('email'),
			'image' => 'profile.png',
			'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 1,
			'date_created' => Time::now()
		]);

		session()->setFlashData('message', '<div class="alert alert-success" role="alert">Berhasil membuat akun.</div>');

		return redirect()->to('/home/login');
	}
}
