<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_kategori'    => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'id_sub_kategori'    => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'  => TRUE
            ],
            'id_user'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'  => TRUE,
                'unsigned' => true,
            ],
            'transaksi'       => [
                'type'       => 'CHAR',
                'constraint' => '12',
            ],
            'keterangan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'bukti_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'  => TRUE
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null'  => TRUE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null'  => TRUE
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null'  => TRUE
            ],
            'deleted_by' => [
                'type' => 'INT',
                'constraint'  => 11,
                'null'  => TRUE,
                'unsigned' => true,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id');
        $this->forge->addForeignKey('id_sub_kategori', 'subkategori', 'id');
        $this->forge->addForeignKey('deleted_by', 'users', 'id');
        $this->forge->addForeignKey('id_user', 'users', 'id');
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
