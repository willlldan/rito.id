<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class Kategori extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_jenis' => 2,
                'kategori' => 'Implementasi Visi dan Misi',
                'slug'    => 'implementasi-visi-dan-misi',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Pendidikan dan Pengajaran',
                'slug'    => 'pendidikan-dan-pengajaran',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Penelitian',
                'slug'    => 'penelitian',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Pengabdian Pada Masyarakat',
                'slug'    => 'pengabdian-pada-masyarakat',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Kegiatan dan Pembinaan Kemahasiswaan',
                'slug'    => 'kegiatan-dan-pembinaan-kemahasiswaan',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Kesejahteraan Tenaga Pendidik dan Kependidikan',
                'slug'    => 'kesejahteraan-tenaga-pendidik-dan-kependidikan',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Sarana dan Prasarana',
                'slug'    => 'sarana-dan-prasaraaa',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Kerjasama, Promosi, dan Bantuan Sosial/kelembagaan',
                'slug'    => 'kerjasama-romosi-dan-bantuan-sosial-kelembagaan',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Pembangunan',
                'slug'    => 'pembangunan',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 1,
                'kategori' => 'Regular',
                'slug'    => 'regular',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Non Regular',
                'slug'    => 'non-regular',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],
            [
                'id_jenis' => 2,
                'kategori' => 'Laboratorium',
                'slug'    => 'laboratorium',
                'created_at' => TIME::now(),
                'updated_at' => null
            ],

        ];

        // Using Query Builder
        $this->db->table('kategori')->insertBatch($data);
    }
}
