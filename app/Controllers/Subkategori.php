<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;

class Subkategori extends BaseController
{
    public function index()
    {

        $current_page = $this->request->getVar('page_subkategori') ? $this->request->getVar('page_subkategori') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $subkategori = $this->subkategoriModel->search($keyword);
        } else {
            $subkategori = $this->subkategoriModel->getSubKategori();
        }

        $data = [
            'title' => "Subkategori Transaksi",
            'subkategori' => $subkategori->paginate(10, 'subkategori'),
            'pager' => $this->subkategoriModel->pager,
            'kategori' => $this->kategoriModel->getKategori()->get()->getResultArray(),
            'currentPage' => $current_page,
            'validation' => \Config\Services::validation(),
            'sideBar' => $this->sideBar
        ];

        return view('transaksi/subkategori', $data);
    }

    public function add()
    {
        // Validasi

        if (!$this->validate([
            'subkategori' => 'required|is_unique[subkategori.subkategori]',
            'id_kategori' => 'required'
        ])) {
            return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
        }

        $slug = url_title($this->request->getVar("subkategori"), '-', true);

        $this->subkategoriModel->save([
            'subkategori' => $this->request->getVar("subkategori"),
            'id_kategori' => $this->request->getVar("id_kategori"),
            'slug' => $slug
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Ditambahkan');
        session()->setFlashData('status', 'success');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        try {
            $this->subkategoriModel->delete($id);
            session()->setFlashData('pesan', 'Data Berhasil Dihapus');
            session()->setFlashData('status', 'success');
        } catch (Exception $e) {
            session()->setFlashData('pesan', 'Data Gagal Dihapus. ' . ($e->getCode() == 1451 ? 'Data yang dihapus masih berkaitan dengan tabel transaksi' : ''));
            session()->setFlashData('status', 'error');
        };

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function edit($id)
    {

        // Cek old kategori

        $subkategoriModel = $this->subkategoriModel->where(['id' => $id])->first();

        if ($subkategoriModel['subkategori'] == $this->request->getVar('subkategori')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[subkategori.subkategori]';
        }

        // Validasi

        if (!$this->validate([
            'subkategori' => $rule,
            'id_kategori' => 'required'
        ])) {
            return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
        }

        $slug = url_title($this->request->getVar("subkategori"), '-', true);
        $this->subkategoriModel->save([
            'id' => $id,
            'id_kategori' => $this->request->getVar("id_kategori"),
            'subkategori' => $this->request->getVar("subkategori"),
            'slug' => $slug
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Diubah');
        session()->setFlashData('status', 'success');

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}
