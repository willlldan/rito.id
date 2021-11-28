<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table      = 'jenis';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['jenis', 'slug'];

    public function search($keyword)
    {

        return $this->table('jenis')->like('jenis', $keyword);
    }
}
