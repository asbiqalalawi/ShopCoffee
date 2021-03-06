<?php

namespace App\Controllers;

use App\Models\KopiModel;
use App\Models\UserModel;
use CodeIgniter\Files\Exceptions\FileNotFoundException;

class Kopi extends BaseController
{
    protected $kopiModel;
    protected $userModel;
    public function __construct()
    {
        $this->kopiModel = new KopiModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        //Mengecek session melalui role_id
        if (session()->get('role_id') == 2) {
            return redirect()->to('/user');
        }

        $currentPage = $this->request->getVar('page_kopi') ? $this->request->getVar('page_kopi') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kopi = $this->kopiModel->search($keyword);
        } else {
            $kopi = $this->kopiModel;
        }

        $data = [
            'title' => 'Kopi Lampung',
            'kopi' => $this->kopiModel->paginate(5, 'kopi'),
            'pager' => $this->kopiModel->pager,
            'name' => session()->get('username'),
            'image' => session()->get('image'),
            'currentPage' => $currentPage
        ];

        return view('kopi/index', $data);
    }

    public function detail($slug)
    {
        //Mengecek session melalui role_id
        if (session()->get('role_id') == 2) {
            return redirect()->to('/user');
        }

        $data = [
            'title' => 'Detail Kopi',
            'kopi' => $this->kopiModel->getKopi($slug),
            'name' => session()->get('username'),
            'image' => session()->get('image')
        ];

        //Jika kopi tidak ada dalam tabel
        if (empty($data['kopi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Kopi ' . $slug . ' tidak ditemukan.');
        }

        return view('kopi/detail', $data);
    }

    public function create()
    {
        //Mengecek session melalui role_id
        if (session()->get('role_id') == 2) {
            return redirect()->to('/user');
        }

        $data = [
            'title' => 'Form Tambah Data Kopi',
            'validation' => \Config\Services::validation(),
            'name' => session()->get('username'),
            'image' => session()->get('image')
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
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga harus diisi.'
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
            'harga' => $this->request->getVar('harga'),
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
        //Mengecek session melalui role_id
        if (session()->get('role_id') == 2) {
            return redirect()->to('/user');
        }

        $data = [
            'title' => 'Form Ubah Data Kopi',
            'validation' => \Config\Services::validation(),
            'kopi' => $this->kopiModel->getKopi($slug),
            'name' => session()->get('username'),
            'image' => session()->get('image')
        ];

        return view('kopi/edit', $data);
    }

    public function update($id)
    {
        //Cek nama kopi apakah ganti atau tidak
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
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga harus diisi.'
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
            'harga' => $this->request->getVar('harga'),
            'stock' => $this->request->getVar('stock'),
            'image' => $imagename,

        ]);

        session()->setFlashData('message', 'Data berhasil diubah.');

        return redirect()->to('/kopi');
    }


    public function userinfo()
    {
        //Mengecek session melalui role_id
        if (session()->get('role_id') == 2) {
            return redirect()->to('/user');
        }

        $data = [
            'title' => 'Kopi Lampung',
            'user' => $this->userModel->getUser(),
            'name' => session()->get('username'),
            'image' => session()->get('image')
        ];

        return view('kopi/userinfo', $data);
    }
}
