<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\I18n\Time;

class Transaksi extends BaseController
{
    public function index($jenis = NULL, $kategori = NULL, $subkategori = NULL)
    {

        $current_page = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;

        $keyword = $this->request->getVar('keyword');
        $date = $this->request->getVar('datepicker');
        $now = TIME::now();

        if ($date) {
            $newDate['startDate'] = explode(' - ', $date)[0];
            $newDate['endDate'] = explode(' - ', $date)[1];
        } else {
            $newDate['startDate'] = '2020-01-01';
            $newDate['endDate'] = $now->toDateString();
        };

        if ($keyword || $date) {
            $transaksi = $this->transaksiModel->search($keyword, $kategori, $subkategori, $newDate);
        } else if ($subkategori) {
            $transaksi = $this->transaksiModel->getTransaksiBySubKategori($subkategori);
        } else {
            $transaksi = $this->transaksiModel->getTransaksiByKategori($kategori);
        }


        $data = [
            'sideBar' => $this->sideBar,
            //'transaksi' => $this->transaksiModel->getTransaksiByJenis($jenis)->paginate(10, 'transaksi'),
            'transaksi' => $transaksi->withDeleted()->paginate(50, 'transaksi'),
            'pager' => $this->transaksiModel->pager,
            'kategori' => $this->kategoriModel->getWhere(['slug' => $kategori])->getRowArray(),
            'jenis' => $this->jenisModel->getWhere(['slug' => $jenis])->getRowArray(),
            'subkategori' => $this->subkategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
            'currentPage' => $current_page
        ];
        if (is_null($data['kategori'])) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // dd($data['transaksi']);
        return view('transaksi/transaksi', $data);
    }


    public function add()
    {
        // Prepare Data
        $idJenis = $this->request->getVar('jenis');
        $idKategori = $this->request->getVar('kategori');
        $idSubKategori = empty($this->request->getVar('id_subkategori')) ? NULL :  $this->request->getVar('id_subkategori');
        $jumlah = str_replace(".", "", $this->request->getVar('jumlah'));

        // Validasi

        $rules = [
            'keterangan' => 'required',
            'jumlah' => 'required',
        ];

        if ($this->request->getFile('buktiTransaksi')) {
            $rules['buktiTransaksi'] = [
                'rules' => 'max_size[buktiTransaksi,4096]|is_image[buktiTransaksi]|mime_in[buktiTransaksi,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'is_image' => 'uploaded image file.',
                    'mime_in' => 'uploaded image file.'
                ]
            ];
        };


        if (!$this->validate($rules)) {
            return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
        }

        // Add Data
        $this->transaksiModel->transStart();
        $this->transaksiModel->insert([
            'id_kategori' => $idKategori,
            'id_sub_kategori' => $idSubKategori,
            'id_user' => user_id(),
            'keterangan' => $this->request->getVar('keterangan'),
            'jumlah' => $jumlah,
            'bukti_transaksi' => $this->request->getVar('buktiTransaksi'),
        ]);

        // update transaksi
        $idTransaksi = $this->transaksiModel->insertID();
        $transaksi = $this->generateTransaksi($idJenis, $idKategori, $this->request->getVar('id_subkategori'), $idTransaksi);
        $this->transaksiModel->save(
            [
                'id' => $idTransaksi,
                'transaksi' => $transaksi
            ]
        );
        $this->transaksiModel->transComplete();


        // Upload Transaksi
        if ($this->request->getFile('buktiTransaksi')) {
            if (!$this->request->getFile('buktiTransaksi')->getError()) {
                $this->upload($this->request->getFile('buktiTransaksi'), "add", $idTransaksi);
            }
        }


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

    // Upload 

    public function upload($file = NULL, $from = NULL, $id = null)
    {

        if (empty($from)) {
            $file = $this->request->getFile('upload');
            $id = $this->request->getVar('id');
            $rules['upload'] = [
                'rules' => 'uploaded[upload]|max_size[upload,4096]|is_image[upload]|mime_in[upload,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'is_image' => 'uploaded image file.',
                    'mime_in' => 'uploaded image file.'
                ]
            ];
            if (!$this->validate($rules)) {
                session()->setFlashData('from', 'upload');
                return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
            }
        }

        $fileName = $file->getRandomName();
        $file->move('assets/img/bukti_transaksi', $fileName);

        $this->transaksiModel->save([
            'id' => $id,
            'bukti_transaksi' => $fileName
        ]);
        if (empty($from)) {
            session()->setFlashData('pesan', 'Data Berhasil Ditambahkan');
            session()->setFlashData('status', 'success');
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function delete($id)
    {
        // $this->transaksiModel->delete($id);

        $this->transaksiModel->save([
            'id' => $id,
            'deleted_at' => TIME::now(),
            'deleted_by' => user_id()
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Dihapus');
        session()->setFlashData('status', 'success');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}
