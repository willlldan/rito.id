<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_jenis'          => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'kategori'       => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '128'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null'  => TRUE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null'  => TRUE
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_jenis', 'jenis', 'id');
        $this->forge->createTable('kategori');
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
