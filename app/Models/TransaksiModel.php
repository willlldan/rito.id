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
    protected $allowedFields        = ['id_kategori', 'id_sub_kategori', 'id_user', 'transaksi', 'keterangan', 'jumlah', 'bukti_transaksi'];

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
        kategori.kategori,
        kategori.slug as kategori_slug,
        kategori.id_jenis as id_jenis,
        jenis.slug as jenis_slug,
        jenis.jenis as jenis
        ');
        $builder->join('kategori', 'kategori.id = transaksi.id_kategori');
        $builder->join('jenis', 'jenis.id = kategori.id_jenis');
        $builder->where('jenis.slug', $jenis);


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
        kategori.kategori,
        kategori.slug as kategori_slug,
        kategori.id_jenis as id_jenis,
        jenis.slug as jenis_slug,
        jenis.jenis as jenis
        ');
        $builder->join('kategori', 'kategori.id = transaksi.id_kategori');
        $builder->join('jenis', 'jenis.id = kategori.id_jenis');
        $builder->where('kategori.slug', $kategori);


        return $builder;
    }
}
