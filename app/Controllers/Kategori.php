<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function index()
    {

        $current_page = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $kategori = $this->kategoriModel->search($keyword);
        } else {
            $kategori = $this->kategoriModel->getKategori();
        }

        $data = [
            'title' => "Kategori Transaksi",
            // 'kategori' => $this->kategoriModel->getKategori(),
            'kategori' => $kategori->paginate(10, 'kategori'),
            'pager' => $this->kategoriModel->pager,
            'jenis' => $this->jenisModel->findAll(),
            'currentPage' => $current_page,
            'validation' => \Config\Services::validation(),
            'sideBar' => $this->sideBar
        ];

        return view('transaksi/kategori', $data);
    }

    public function add()
    {
        // Validasi

        if (!$this->validate([
            'kategori' => 'required|is_unique[kategori.kategori]',
            'id_jenis' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kategori')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar("kategori"), '-', true);

        $this->kategoriModel->save([
            'kategori' => $this->request->getVar("kategori"),
            'id_jenis' => $this->request->getVar("id_jenis"),
            'slug' => $slug
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Ditambahkan');
        session()->setFlashData('status', 'success');

        return redirect()->to('/kategori');
    }

    public function delete($id)
    {

        $this->kategoriModel->delete($id);

        session()->setFlashData('pesan', 'Data Berhasil Dihapus');
        session()->setFlashData('status', 'success');

        return redirect()->to('/kategori');
    }

    public function edit($id)
    {

        // Cek old jenis

        $kategoriModel = $this->kategoriModel->where(['id' => $id])->first();

        if ($kategoriModel['kategori'] == $this->request->getVar('kategori')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[kategori.kategori]';
        }

        // Validasi

        if (!$this->validate([
            'kategori' => $rule,
            'id_jenis' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kategori')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar("kategori"), '-', true);
        $this->kategoriModel->save([
            'id' => $id,
            'id_jenis' => $this->request->getVar("id_jenis"),
            'kategori' => $this->request->getVar("kategori"),
            'slug' => $slug
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Diubah');
        session()->setFlashData('status', 'success');

        return redirect()->to('/kategori');
    }
}