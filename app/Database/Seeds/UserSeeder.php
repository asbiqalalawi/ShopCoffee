<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'username'      => 'Asbiq Al Alawi',
                'email'         => 'asbiq@gmail.com',
                'image'         => 'default.png',
                'password'      => password_hash('asbiq', PASSWORD_DEFAULT),
                'role_id'       => 1,
                'is_active'     => 1,
                'date_created'  => Time::now()
            ],
            [
                'username'      => 'Abie Perdana Kusuma',
                'email'         => 'abie@gmail.com',
                'image'         => 'default.png',
                'password'      => password_hash('abie', PASSWORD_DEFAULT),
                'role_id'       => 1,
                'is_active'     => 1,
                'date_created'  => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO user (username, email) VALUES(:username:, :email:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
