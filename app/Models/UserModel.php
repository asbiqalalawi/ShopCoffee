<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['username', 'email', 'password', 'image', 'is_active', 'role_id', 'date_created'];

    public function getUser($user_id = false)
    {
        if ($user_id == false) {
            return $this->findAll();
        }

        return $this->where(['user_id' => $user_id])->first();
    }
}
