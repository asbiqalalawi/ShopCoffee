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

        //Jika kopi tidak ada dalam tabel
        if (empty($data['kopi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Kopi ' . $slug . ' tidak ditemukan.');
        }

        return view('kopi/detail', $data);
    }

    public function create()
    {
        // session();

        $data = [
            'title' => 'Form Tambah Data Kopi',
            'validation' => \Config\Services::validation()
        ];

        return view('kopi/create', $data);
    }

    public function save()
    {
        //Validasi
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[kopi.name]',
                'errors' => [
                    'required' => 'Nama kopi harus diisi.',
                    'is_unique' => 'Nama kopi sudah terdaftar.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Kopi/create')->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->kopiModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'image' => $this->request->getVar('image'),

        ]);

        session()->setFlashData('message', 'Data berhasil ditambahkan.');

        return redirect()->to('/Kopi');
    }
}
