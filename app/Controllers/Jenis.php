<?php

namespace App\Controllers;

use Exception;

class Jenis extends BaseController
{
    public function index()
    {

        $current_page = $this->request->getVar('page_jenis') ? $this->request->getVar('page_jenis') : 1;


        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $jenis = $this->jenisModel->search($keyword);
        } else {
            $jenis = $this->jenisModel;
        }

        $data = [
            'title' => "Jenis Transaksi",
            'active' => 'utilities',
            'jenis' => $jenis->paginate(10, 'jenis'),
            'pager' => $this->jenisModel->pager,
            'currentPage' => $current_page,
            'validation' => \Config\Services::validation(),
            'sideBar' => $this->sideBar
        ];

        return view('transaksi/jenis', $data);
    }

    public function add()
    {
        // Validasi

        if (!$this->validate([
            'jenis' => 'required|is_unique[jenis.jenis]'
        ])) {
            return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
        }

        $slug = url_title($this->request->getVar("jenis"), '-', true);
        $this->jenisModel->save([
            'jenis' => $this->request->getVar("jenis"),
            'slug' => $slug
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Ditambahkan');
        session()->setFlashData('status', 'success');

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }


    public function delete($id)
    {
        try {
            $this->jenisModel->delete($id);
            session()->setFlashData('pesan', 'Data Berhasil Dihapus');
            session()->setFlashData('status', 'success');
        } catch (Exception $e) {
            session()->setFlashData('pesan', 'Data Gagal Dihapus. ' . ($e->getCode() == 1451 ? 'Data yang dihapus masih berkaitan dengan tabel kategori' : ''));
            session()->setFlashData('status', 'error');
        }
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function edit($id)
    {

        // Cek old jenis

        $jenisLama = $this->jenisModel->where(['id' => $id])->first();

        if ($jenisLama['jenis'] == $this->request->getVar('jenis')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[jenis.jenis]';
        }

        // Validasi

        if (!$this->validate([
            'jenis' => $rule
        ])) {
            return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
        }

        $slug = url_title($this->request->getVar("jenis"), '-', true);
        $this->jenisModel->save([
            'id' => $id,
            'jenis' => $this->request->getVar("jenis"),
            'slug' => $slug
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Diubah');
        session()->setFlashData('status', 'success');

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}
