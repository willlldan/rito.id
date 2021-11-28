<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkategoriModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'subkategori';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id_kategori', 'subkategori', 'slug'];

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


    public function getSubKategori()
    {
        $builder = $this->table('subkategori');
        $builder->select('
        subkategori.id,
        subkategori.id_kategori,
        subkategori.subkategori,
        subkategori.slug,
        kategori.kategori,
        kategori.slug as kategori_slug
        ');
        $builder->join('kategori', 'kategori.id = subkategori.id_kategori');

        return $builder;
    }

    public function search($keyword)
    {
        $builder = $this->table('subkategori');
        $builder->select('
        subkategori.id,
        subkategori.id_kategori,
        subkategori.subkategori,
        subkategori.slug,
        kategori.kategori,
        kategori.slug as kategori_slug
        ');
        $builder->join('kategori', 'kategori.id = subkategori.id_kategori');
        $builder->like('subkategori.subkategori', $keyword);
        $builder->orlike('kategori.kategori', $keyword);

        return $builder;
    }
}
