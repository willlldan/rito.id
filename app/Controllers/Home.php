<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function index()
    {



        // dd(TIME::now()->getMonth());

        if ($this->request->getVar('month')) {
            $year = explode("-", $this->request->getVar('month'))[0];
            $month = explode("-", $this->request->getVar('month'))[1];
            $danaMasuk = $this->transaksiModel->sum(1, $year, $month)->get()->getRowArray();
            $danaKeluar = $this->transaksiModel->sum(2, $year, $month)->get()->getRowArray();
            $chartDanaMasuk = $this->transaksiModel->sumByKategori(1, $year, $month)->get()->getResultArray();
            $chartDanaKeluar = $this->transaksiModel->sumByKategori(2, $year, $month)->get()->getResultArray();
        } else {
            $danaMasuk = $this->transaksiModel->sum(1, TIME::now()->getYear(),  TIME::now()->getMonth())->get()->getRowArray();
            $danaKeluar = $this->transaksiModel->sum(2, TIME::now()->getYear(),  TIME::now()->getMonth())->get()->getRowArray();
            $chartDanaMasuk = $this->transaksiModel->sumByKategori(1, TIME::now()->getYear(),  TIME::now()->getMonth())->get()->getResultArray();
            $chartDanaKeluar = $this->transaksiModel->sumByKategori(2, TIME::now()->getYear(),  TIME::now()->getMonth())->get()->getResultArray();
        }

        $data = [
            'sideBar' => $this->sideBar,
            'danaMasuk' => $danaMasuk['jumlah'],
            'danaKeluar' => $danaKeluar['jumlah'],
            'saldo' => (int)$danaMasuk['jumlah'] - (int)$danaKeluar['jumlah'],
            'chartDanaMasuk' => $chartDanaMasuk,
            'chartDanaKeluar' => $chartDanaKeluar,
            'kategoriDanaKeluar' => $this->kategoriModel->where('id_jenis', 2)->get()->getResultArray(),
            'now' => TIME::now()->getYear() . "-" . TIME::now()->getMonth()
        ];

        // d($data['kategoriDanaKeluar']);
        // d($data['chartDanaMasuk']);
        // dd($data['chartDanaKeluar']);
        return view('pages/home', $data);
    }
}
