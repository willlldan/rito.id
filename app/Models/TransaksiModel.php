<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'transaksi';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = true;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id_kategori',
        'id_sub_kategori', 'id_user', 'transaksi',
        'keterangan', 'jumlah', 'bukti_transaksi',
        'deleted_by', 'deleted_at'
    ];

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

    public function getTransaksiByJenis($jenis)
    {

        $builder = $this->table('transaksi');
        $builder->select('
        transaksi.id,
        transaksi.id_kategori,
        transaksi.id_sub_kategori,
        transaksi.id_user,
        transaksi.transaksi,
        transaksi.keterangan,
        transaksi.jumlah,
        transaksi.bukti_transaksi,
        transaksi.created_at,
        transaksi.deleted_at,
        transaksi.deleted_by,
        users.username,
        kategori.kategori,
        kategori.slug as kategori_slug,
        kategori.id_jenis as id_jenis,
        subkategori.subkategori,
        subkategori.slug,
        jenis.slug as jenis_slug,
        jenis.jenis as jenis
        ');
        $builder->join('users', 'users.id = transaksi.deleted_by', 'left');
        $builder->join('kategori', 'kategori.id = transaksi.id_kategori');
        $builder->join('jenis', 'jenis.id = kategori.id_jenis');
        $builder->join('subkategori', 'subkategori.id = transaksi.id_sub_kategori', 'left');
        $builder->where('jenis.slug', $jenis);
        $builder->orderBy('transaksi.id', 'DESC');


        return $builder;
    }

    public function getTransaksiByKategori($kategori)
    {

        $builder = $this->table('transaksi');
        $builder->select('
        transaksi.id,
        transaksi.id_kategori,
        transaksi.id_sub_kategori,
        transaksi.id_user,
        transaksi.transaksi,
        transaksi.keterangan,
        transaksi.jumlah,
        transaksi.bukti_transaksi,
        transaksi.created_at,
        transaksi.deleted_at,
        transaksi.deleted_by,
        users.username,
        kategori.kategori,
        kategori.slug as kategori_slug,
        kategori.id_jenis as id_jenis,
        subkategori.subkategori,
        subkategori.slug as subkategori_slug,
        jenis.slug as jenis_slug,
        jenis.jenis as jenis
        ');
        $builder->join('users', 'users.id = transaksi.deleted_by', 'left');
        $builder->join('kategori', 'kategori.id = transaksi.id_kategori');
        $builder->join('jenis', 'jenis.id = kategori.id_jenis');
        $builder->join('subkategori', 'subkategori.id = transaksi.id_sub_kategori', 'left');
        $builder->where('kategori.slug', $kategori);
        $builder->orderBy('transaksi.id', 'DESC');
        return $builder;
    }

    public function getTransaksiBySubKategori($subkategori)
    {

        $builder = $this->table('transaksi');
        $builder->select('
        transaksi.id,
        transaksi.id_kategori,
        transaksi.id_sub_kategori,
        transaksi.id_user,
        transaksi.transaksi,
        transaksi.keterangan,
        transaksi.jumlah,
        transaksi.bukti_transaksi,
        transaksi.created_at,
        transaksi.deleted_at,
        transaksi.deleted_by,
        users.username,
        kategori.kategori,
        kategori.slug as kategori_slug,
        kategori.id_jenis as id_jenis,
        subkategori.subkategori,
        subkategori.slug as subkategori_slug,
        jenis.slug as jenis_slug,
        jenis.jenis as jenis
        ');
        $builder->join('users', 'users.id = transaksi.deleted_by', 'left');
        $builder->join('kategori', 'kategori.id = transaksi.id_kategori');
        $builder->join('jenis', 'jenis.id = kategori.id_jenis');
        $builder->join('subkategori', 'subkategori.id = transaksi.id_sub_kategori', 'left');
        $builder->where('subkategori.slug', $subkategori);
        $builder->orderBy('transaksi.id', 'DESC');
        return $builder;
    }

    public function search($keyword, $kategori, $subkategori = NULL, $date = NULL)
    {
        $builder = $this->table('transaksi');
        $builder->select('
        transaksi.id,
        transaksi.id_kategori,
        transaksi.id_sub_kategori,
        transaksi.id_user,
        transaksi.transaksi,
        transaksi.keterangan,
        transaksi.jumlah,
        transaksi.bukti_transaksi,
        transaksi.created_at,
        transaksi.deleted_at,
        transaksi.deleted_by,
        users.username,
        kategori.kategori,
        kategori.slug as kategori_slug,
        kategori.id_jenis as id_jenis,
        subkategori.subkategori,
        subkategori.slug as subkategori_slug,
        jenis.slug as jenis_slug,
        jenis.jenis as jenis
        ');
        $builder->join('users', 'users.id = transaksi.deleted_by', 'left');
        $builder->join('kategori', 'kategori.id = transaksi.id_kategori');
        $builder->join('jenis', 'jenis.id = kategori.id_jenis');
        $builder->join('subkategori', 'subkategori.id = transaksi.id_sub_kategori', 'left');
        $builder->where('kategori.slug', $kategori);

        if ($subkategori) {
            $builder->where('subkategori.slug', $subkategori);
        }

        if ($date) {
            $builder->where('transaksi.created_at >=', $date['startDate']);
            $builder->where('transaksi.created_at <=', $date['endDate']);
        }

        if ($keyword) {
            $builder->like('kategori.kategori', $keyword);
            $builder->orlike('jenis', $keyword);
            $builder->orlike('transaksi', $keyword);
            $builder->orlike('keterangan', $keyword);
            $builder->orlike('jumlah', $keyword);
            # code...
        }

        $builder->orderBy('transaksi.id', 'DESC');


        return $builder;
    }


    // $id = id_jenis
    // 1 = dana-masuk
    // 2 = dana-keluar
    public function sum($id, $year, $month)
    {
        $builder = $this->table('transaksi');
        $builder->selectSum('jumlah');
        $builder->join('kategori', 'kategori.id = transaksi.id_kategori');
        $builder->where('id_jenis', $id);
        $builder->where('deleted_at', NULL);
        $builder->where('MONTH(`transaksi`.`created_at`)', $month);
        $builder->where('YEAR(`transaksi`.`created_at`)', $year);

        return $builder;
    }

    public function sumByKategori($id, $year, $month)
    {
        $builder = $this->table('transaksi');
        $builder->select('`transaksi`.`id_kategori`');
        $builder->select('`kategori`.`kategori`');
        $builder->selectSum('jumlah');
        $builder->join('kategori', 'kategori.id = transaksi.id_kategori');
        $builder->where('id_jenis', $id);
        $builder->where('deleted_at', NULL);
        $builder->where('MONTH(`transaksi`.`created_at`)', $month);
        $builder->where('YEAR(`transaksi`.`created_at`)', $year);
        $builder->groupBy('`kategori`.`kategori`');

        return $builder;
    }
}
