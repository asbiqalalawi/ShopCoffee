<?php

namespace App\Models;

use CodeIgniter\Model;

class KopiModel extends Model
{
    protected $table = 'kopi';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'slug', 'deskripsi', 'image'];

    public function getKopi($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
