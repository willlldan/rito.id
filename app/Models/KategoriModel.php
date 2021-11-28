<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'kategori';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id_jenis', 'kategori', 'slug'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];


    public function getKategori()
    {
        $builder = $this->table('kategori');
        $builder->select('
        kategori.id,
        kategori.id_jenis,
        kategori.kategori,
        kategori.slug,
        jenis.jenis,
        jenis.slug as jenis_slug
        ');
        $builder->join('jenis', 'jenis.id = kategori.id_jenis');

        return $builder;
    }

    public function search($keyword)
    {
        $builder = $this->table('kategori');
        $builder->select('
        kategori.id,
        kategori.id_jenis,
        kategori.kategori,
        kategori.slug,
        jenis.jenis,
        jenis.slug as jenis_slug
        ');
        $builder->join('jenis', 'jenis.id = kategori.id_jenis');
        $builder->like('kategori.kategori', $keyword);
        $builder->orlike('jenis.jenis', $keyword);


        return $builder;
    }
}
