<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jenis extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'jenis'       => [
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
        $this->forge->createTable('jenis');
    }

    public function down()
    {
        $this->forge->dropTable('jenis');
    }
}
