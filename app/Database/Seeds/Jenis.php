<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Jenis extends Seeder
{
    public function run()
    {

        $data = [
            [
                'jenis' => 'Dana Masuk',
                'slug'    => 'dana-masuk',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'jenis' => 'Dana Keluar',
                'slug'    => 'dana-keluar',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'jenis' => 'Saldo',
                'slug'    => 'saldo',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
        ];

        // Using Query Builder
        $this->db->table('jenis')->insertBatch($data);
    }
}
