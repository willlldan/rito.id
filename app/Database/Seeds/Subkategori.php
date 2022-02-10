<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class Subkategori extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori' => 1,
                'subkategori' => 'Persiapan Kegiatan',
                'slug'    => 'persiapan-kegiatan',
                'created_at' => TIME::now('Asia/Jakarta'),
                'updated_at' => null
            ],
            [
                'id_kategori' => 1,
                'subkategori' => 'Pendanaan Kegiatan',
                'slug'    => 'pendanaan-kegiatan',
                'created_at' => TIME::now('Asia/Jakarta'),
                'updated_at' => null
            ],
            [
                'id_kategori' => 2,
                'subkategori' => 'Persiapan Kegiatan Penelitian',
                'slug'    => 'persiapan-kegiatan-penelitian',
                'created_at' => TIME::now('Asia/Jakarta'),
                'updated_at' => null
            ],

        ];

        // Using Query Builder
        $this->db->table('subkategori')->insertBatch($data);
    }
}
