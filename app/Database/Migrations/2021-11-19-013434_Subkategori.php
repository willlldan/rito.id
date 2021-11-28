<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subkategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_kategori'          => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'subkategori'       => [
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
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id');
        $this->forge->createTable('subkategori');
    }

    public function down()
    {
        $this->forge->dropTable('subkategori');
    }
}
