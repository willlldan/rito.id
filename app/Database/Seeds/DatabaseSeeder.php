<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('AuthGroups');
        $this->call('Users');
        $this->call('AuthGroupsUsers');
        $this->call('Jenis');
        $this->call('Kategori');
        $this->call('Subkategori');
        $this->call('Transaksi');
    }
}
