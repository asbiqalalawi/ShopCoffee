<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class UserroleSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'role'      => 'Admin'
            ],
            [
                'role'      => 'Member'
            ]
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO user (username, email) VALUES(:username:, :email:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('user_role')->insertBatch($data);
    }
}
