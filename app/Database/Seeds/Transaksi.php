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
                'id_kategori'    => 1,
                'id_sub_kategori' => 1,
                'id_user'       => 2,
                'transaksi'      => $this->generateTransaksi('2', '1', '1', '2'),
                'keterangan'    => 'Honor Asisten',
                'jumlah'    => 100000000,
                'bukti_transaksi' => 'nota1.jpg',
                'created_at' => TIME::now(),
                'updated_at' => TIME::now(),
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'id_kategori'    => 1,
                'id_sub_kategori' => 1,
                'id_user'       => 2,
                'transaksi'      => $this->generateTransaksi('2', '1', '1', '3'),
                'keterangan'    => 'Honor Dosen',
                'jumlah'    => 200000000,
                'bukti_transaksi' => 'nota2.jpeg',
                'created_at' => TIME::now(),
                'updated_at' => TIME::now(),
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'id_kategori'    => 1,
                'id_sub_kategori' => 1,
                'id_user'       => 2,
                'transaksi'      => $this->generateTransaksi('2', '1', '2', '4'),
                'keterangan'    => 'Honor Dosen',
                'jumlah'    => 200000000,
                'bukti_transaksi' => 'nota3.jpg',
                'created_at' => TIME::now(),
                'updated_at' => TIME::now(),
                'deleted_at' => null,
                'deleted_by' => null
            ],

        ];

        // Using Query Builder
        $this->db->table('transaksi')->insertBatch($data);

        $tahun = 2017;
        for ($i = 0; $i < 20; $i++) {

            if ($i % 3 == 0) {
                $tahun++;
            }

            $danaMasuk = [
                [
                    'id_kategori'    => 10,
                    'id_sub_kategori' => null,
                    'id_user'       => 2,
                    'transaksi'      => $this->generateTransaksi('1', '10', '', ($i + 4)),
                    'keterangan'    => 'Penerimaan Dana DPP ' . $tahun,
                    'jumlah'    => (rand(10, 90) * 1000000),
                    'bukti_transaksi' => null,
                    'created_at' => TIME::now(),
                    'updated_at' => TIME::now(),
                    'deleted_at' => null,
                    'deleted_by' => null
                ],
                [
                    'id_kategori'    => 11,
                    'id_sub_kategori' => null,
                    'id_user'       => 2,
                    'transaksi'      => $this->generateTransaksi('1', '10', '', ($i + 4)),
                    'keterangan'    => 'Penerimaan DPP Non Reg ' . $tahun,
                    'jumlah'    => (rand(10, 90) * 1000000),
                    'bukti_transaksi' => null,
                    'created_at' => TIME::now(),
                    'updated_at' => TIME::now(),
                    'deleted_at' => null,
                    'deleted_by' => null
                ],
                [
                    'id_kategori'    => 12,
                    'id_sub_kategori' => null,
                    'id_user'       => 2,
                    'transaksi'      => $this->generateTransaksi('1', '10', '', ($i + 4)),
                    'keterangan'    => 'Penerimaan Dana Praktikum ' . $tahun,
                    'jumlah'    => (rand(10, 90) * 1000000),
                    'bukti_transaksi' => null,
                    'created_at' => TIME::now(),
                    'updated_at' => TIME::now(),
                    'deleted_at' => null,
                    'deleted_by' => null
                ],
            ];

            $this->db->table('transaksi')->insert($danaMasuk[$i % 3]);
        }
    }


    protected function generateTransaksi($jenis = 0, $kategori = 0, $subkategori = 0, $id = 0)
    {
        $time = TIME::now();
        $newKategori = sprintf('%02u', $kategori);
        $newSubKategori = sprintf('%02u', $subkategori);
        $day = sprintf('%02u', $time->getDay());
        $month = sprintf('%02u', $time->getMonth());
        $newId = sprintf('%03u', $id);

        return $jenis . $newKategori . $newSubKategori . $day . $month . $newId;
    }
}
