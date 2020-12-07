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
            ],
            'stock' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Stok harus diisi.'
                ]
            ],
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu.',
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Anda bukan memilih gambar',
                    'mime_in' => 'Anda bukan memilih gambar'
                ]
            ]
        ])) {
            return redirect()->to('/Kopi/create')->withInput();
        }

        //Mengambil gambar
        $fileimage = $this->request->getFile('image');

        //Memindahlan file ke img
        $fileimage->move('img');

        //Mengambil nama file
        $imagename = $fileimage->getName();

        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->kopiModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'stock' => $this->request->getVar('stock'),
            'image' => $imagename,

        ]);

        session()->setFlashData('message', 'Data berhasil ditambahkan.');

        return redirect()->to('/kopi');
    }

    public function delete($id)
    {
        //Cari gambar berdasarkan id
        $kopi = $this->kopiModel->find($id);

        //Menghapus gambar
        unlink('img/' . $kopi['image']);

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

        //validasi
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kopi harus diisi.',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ],
            'stock' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Stok harus diisi.'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Anda bukan memilih gambar',
                    'mime_in' => 'Anda bukan memilih gambar'
                ]
            ]
        ])) {
            return redirect()->to('/Kopi/edit/' . $this->request->getVar('slug'))->withInput();
        }

        //Ambil gambar
        $fileImage = $this->request->getFile('image');

        //cek gambar, apakah diganti atau tidak
        if ($fileImage->getError() == 4) {
            $imagename = $this->request->getVar('imageLama');
        } else {
            $imagename = $fileImage->getName('');
            //Pindah gambar
            $fileImage->move('img', $imagename);
            //hapus file yang lama
            unlink('img/' . $this->request->getVar('imageLama'));
        }

        $slug = url_title($this->request->getVar('name'), '-', true);

        $this->kopiModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'stock' => $this->request->getVar('stock'),
            'image' => $imagename,

        ]);

        session()->setFlashData('message', 'Data berhasil diubah.');

        return redirect()->to('/kopi');
    }
}
