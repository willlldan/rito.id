<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class Transaksi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori'    => 10,
                'id_sub_kategori' => null,
                'id_user'       => null,
                'transaksi'      => '304211126001',
                'tgl_transaksi'    => TIME::now(),
                'keterangan'    => 'Penerimaan Dana DPP',
                'jumlah'    => 300000000,
                'bukti_transaksi' => null,
                'created_at' => TIME::now(),
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'id_kategori'    => 1,
                'id_sub_kategori' => 1,
                'id_user'       => null,
                'transaksi'      => '304211126002',
                'tgl_transaksi'    => TIME::now(),
                'keterangan'    => 'Honor Asisten',
                'jumlah'    => 100000000,
                'bukti_transaksi' => null,
                'created_at' => TIME::now(),
                'deleted_at' => null,
                'deleted_by' => null
            ],

        ];

        // Using Query Builder
        $this->db->table('transaksi')->insertBatch($data);
    }
}
