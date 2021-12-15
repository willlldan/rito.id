<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Myth\Auth\Password;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => '173040071@mail.unpas.ac.id',
                'username' => 'admin',
                'password_hash' => Password::hash('pasundan'),
                'active' => '1',
                'created_at' => TIME::now(),
                'updated_at' => TIME::now()
            ],
            [
                'email' => 'bendahara@unpas.ac.id',
                'username' => 'Bendahara',
                'password_hash' => Password::hash('pasundan'),
                'active' => '1',
                'created_at' => TIME::now(),
                'updated_at' => TIME::now()
            ],
            [
                'email' => 'kaprodi@unpas.ac.id',
                'username' => 'kaprodi',
                'password_hash' => Password::hash('pasundan'),
                'active' => '1',
                'created_at' => TIME::now(),
                'updated_at' => TIME::now()
            ],


        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
