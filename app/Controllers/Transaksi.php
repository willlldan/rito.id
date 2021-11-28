<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\I18n\Time;

class Transaksi extends BaseController
{
    public function index($jenis = NULL, $kategori = NULL)
    {
        $data = [
            'sideBar' => $this->sideBar,
            //'transaksi' => $this->transaksiModel->getTransaksiByJenis($jenis)->paginate(10, 'transaksi'),
            'transaksi' => $this->transaksiModel->getTransaksiByKategori($kategori)->paginate(10, 'transaksi'),
            'pager' => $this->transaksiModel->pager,
            'kategori' => $this->kategoriModel->getWhere(['slug' => $kategori])->getRowArray(),
            'jenis' => $this->jenisModel->getWhere(['slug' => $jenis])->getRowArray(),
            'subkategori' => $this->subkategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        if (is_null($data['kategori'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('transaksi/transaksi', $data);
    }


    public function add()
    {

        // Prepare Data
        $idJenis = $this->request->getVar('jenis');
        $idKategori = $this->request->getVar('kategori');
        $idSubKategori = is_null($this->request->getVar('id_subkategori')) ? 0 : $this->request->getVar('id_subkategori');
        $jumlah = str_replace(".", "", $this->request->getVar('jumlah'));




        // Validasi

        if (!$this->validate([
            'keterangan' => 'required',
            'jumlah' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to($_SERVER['HTTP_REFERER'])->withInput()->with('validation', $validation);
        }



        // Add Data
        $this->transaksiModel->transStart();
        $this->transaksiModel->insert([
            'id_kategori' => $idKategori,
            'id_sub_kategori' => $idSubKategori,
            'id_user' => $this->request->getVar('idUser'),
            'keterangan' => $this->request->getVar('keterangan'),
            'jumlah' => $jumlah,
            'bukti_transaksi' => $this->request->getVar('buktiTransaksi'),
        ]);

        // update transaksi
        $idTransaksi = $this->transaksiModel->insertID();
        $transaksi = $this->generateTransaksi($idJenis, $idKategori, $idSubKategori, $idTransaksi);
        $this->transaksiModel->save(
            [
                'id' => $idTransaksi,
                'transaksi' => $transaksi
            ]
        );
        $this->transaksiModel->transComplete();

        session()->setFlashData('pesan', 'Data Berhasil Ditambahkan');
        session()->setFlashData('status', 'success');

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    protected function generateTransaksi($jenis = 0, $kategori = 0, $subkategori = 0, $id = 0)
    {
        $time = TIME::now();
        $newKategori = sprintf('%02u', $kategori);
        $newSubKategori = sprintf('%02u', $subkategori);
        $day = sprintf('%02u', $time->getDay());
        $month = sprintf('%02u', $time->getMonth());
        $newId = sprintf('%03u', $id);

        return $jenis . $newKategori . $newSubKategori . $day . $month . $newId;
    }
}
