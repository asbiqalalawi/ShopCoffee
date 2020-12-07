<?php

namespace App\Database\Seeds;

class PesananSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'username'  => 'Rahmayanti Kurniasih',
                'email'     => 'rahma@gmail.com',
                'name'      => 'Kopi Premium Soultan Coffee',
                'jumlah'    => 1,
                'harga'     => 37500
            ],
            [
                'username'  => 'Amara Indah Pancarani',
                'email'     => 'amara@gmail.com',
                'name'      => 'Kopi Premium Soultan Coffee',
                'jumlah'    => 1,
                'harga'     => 37500
            ]
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO user (username, email) VALUES(:username:, :email:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('pesanan')->insertBatch($data);
    }
}
