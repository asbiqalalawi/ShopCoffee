<?php

namespace App\Controllers;

use App\Models\KopiModel;

class User extends BaseController
{
    protected $kopiModel;
    public function __construct()
    {
        $this->kopiModel = new KopiModel();
    }

    public function index()
    {
        echo 'Welocome ' . session()->get('email');
        echo 'User ' . session()->get('role_id');
        $data = [
            'title' => 'Dashboard | Kopi Lampung',
            'kopi' => $this->kopiModel->getKopi()
        ];
        return view('user/user_index', $data);
    }
}
