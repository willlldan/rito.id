<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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

        // d($data['subkategori']);
        // dd(array_search(3, array_column($data['subkategori'], 'id')));

        return view('transaksi/subkategori', $data);
    }

    public function add()
    {
        // Validasi

        if (!$this->validate([
            'subkategori' => 'required|is_unique[subkategori.subkategori]',
            'id_kategori' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/subkategori')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar("subkategori"), '-', true);

        $this->subkategoriModel->save([
            'subkategori' => $this->request->getVar("subkategori"),
            'id_kategori' => $this->request->getVar("id_kategori"),
            'slug' => $slug
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Ditambahkan');
        session()->setFlashData('status', 'success');

        return redirect()->to('/subkategori');
    }

    public function delete($id)
    {

        $this->subkategoriModel->delete($id);

        session()->setFlashData('pesan', 'Data Berhasil Dihapus');
        session()->setFlashData('status', 'success');

        return redirect()->to('/subkategori');
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
            $validation = \Config\Services::validation();
            return redirect()->to('/subkategori')->withInput()->with('validation', $validation);
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

        return redirect()->to('/subkategori');
    }
}
