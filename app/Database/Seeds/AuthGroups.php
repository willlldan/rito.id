<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class AuthGroups extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'superadmin',
                'description' => 'Admin who have permission to access all features in app'
            ],
            [
                'name' => 'bendahara',
                'description' => 'Admin who have permission to access all transaction features in app'
            ],

        ];

        // Using Query Builder
        $this->db->table('auth_groups')->insertBatch($data);
    }
}
