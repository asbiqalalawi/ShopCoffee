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

        return redirect()->to('/kopi');
    }

    public function delete($id)
    {
        $this->kopiModel->delete($id);
        session()->setFlashData('message', 'Data berhasil dihapus.');
        return redirect()->to('/kopi');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Kopi',
            'validation' => \Config\Services::validation(),
            'kopi' => $this->kopiModel->getKopi($slug)
        ];

        return view('kopi/edit', $data);
    }

    public function update($id)
    {
        //cek judul
        $kopiLama = $this->kopiModel->getKopi($this->request->getVar('slug'));
        if ($kopiLama['name'] == $this->request->getVar('name')) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|is_unique[kopi.name]';
        }

        //validasi
        if (!$this->validate([
            'name' => [
                'rules' => $rule_name,
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
            return redirect()->to('/Kopi/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('name'), '-', true);

        $this->kopiModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'image' => $this->request->getVar('image'),

        ]);

        session()->setFlashData('message', 'Data berhasil diubah.');

        return redirect()->to('/kopi');
    }
}
