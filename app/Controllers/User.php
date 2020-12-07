<?php

namespace App\Controllers;

use App\Models\KopiModel;
use mysqli;

class User extends BaseController
{
    protected $kopiModel;
    public function __construct()
    {
        $this->kopiModel = new KopiModel();
    }

    public function index()
    {
        //     echo 'Welcome ' . session()->get('email');
        //     echo 'User ' . session()->get('role_id');

        $data = [
            'title' => 'Dashboard | Kopi Lampung',
            'kopi' => $this->kopiModel->getKopi()
        ];
        return view('user/user_index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Kopi',
            'kopi' => $this->kopiModel->getKopi($slug)
        ];

        //Jika kopi tidak ada dalam tabel
        if (empty($data['kopi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Kopi ' . $slug . ' tidak ditemukan.');
        }

        return view('user/user_detail', $data);
    }

    public function buy($id)
    {
        $connect = new mysqli("localhost", "root", "", "ecommerce");
        // // dd($connect);
        if (mysqli_query($connect, "UPDATE kopi SET stock=stock-1 WHERE id=$id")) {
            session()->setFlashdata('message', 'Berhasil membeli Kopi.');

            return redirect()->to(base_url('/user'));
        }
    }
}
