<?php

namespace App\Controllers;

use App\Models\KopiModel;
use CodeIgniter\Files\Exceptions\FileNotFoundException;

class Kopi extends BaseController
{
    protected $kopiModel;
    public function __construct()
    {
        $this->kopiModel = new KopiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kopi Lampung',
            'kopi' => $this->kopiModel->getKopi()
        ];



        return view('kopi/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Kopi',
            'kopi' => $this->kopiModel->getKopi($slug)
        ];
        return view('kopi/detail', $data);
    }
}
