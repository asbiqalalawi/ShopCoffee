<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'username'      => 'Rahmayanti Kurniasih',
                'email'         => 'rahma@gmail.com',
                'image'         => 'default.png',
                'password'      => password_hash('rahma', PASSWORD_DEFAULT),
                'role_id'       => 2,
                'is_active'     => 1,
                'date_created'  => Time::now()
            ],
            [
                'username'      => 'Amara Indah Pancarani',
                'email'         => 'amara@gmail.com',
                'image'         => 'default.png',
                'password'      => password_hash('amara', PASSWORD_DEFAULT),
                'role_id'       => 2,
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
