<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Fpdf\Fpdf;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function index()
    {
        $data = [
            'sideBar' => $this->sideBar,
            'active' => 'home',
            'title' => 'laporan',
        ];


        return view('pages/laporan', $data);
    }

    public function createLaporan()
    {

        if ($this->request->getVar('month')) {
            $year = explode("-", $this->request->getVar('month'))[0];
            $month = explode("-", $this->request->getVar('month'))[1];
            $danaMasuk = $this->transaksiModel->sum(1, $year, $month)->get()->getRowArray();
            $danaKeluar = $this->transaksiModel->sum(2, $year, $month)->get()->getRowArray();
            $chartDanaMasuk = $this->transaksiModel->sumByKategori(1, $year, $month)->get()->getResultArray();
            $chartDanaKeluar = $this->transaksiModel->sumByKategori(2, $year, $month)->get()->getResultArray();
        } else {
            $danaMasuk = $this->transaksiModel->sum(1, TIME::now('Asia/Jakarta')->getYear(),  TIME::now('Asia/Jakarta')->getMonth())->get()->getRowArray();
            $danaKeluar = $this->transaksiModel->sum(2, TIME::now('Asia/Jakarta')->getYear(),  TIME::now('Asia/Jakarta')->getMonth())->get()->getRowArray();
            $chartDanaMasuk = $this->transaksiModel->sumByKategori(1, TIME::now('Asia/Jakarta')->getYear(),  TIME::now('Asia/Jakarta')->getMonth())->get()->getResultArray();
            $chartDanaKeluar = $this->transaksiModel->sumByKategori(2, TIME::now('Asia/Jakarta')->getYear(),  TIME::now('Asia/Jakarta')->getMonth())->get()->getResultArray();
        }

        $transaksiDanaMasuk = $this->transaksiModel->getTransaksiByJenis('dana-masuk')->get()->getResultArray();

        $data = [
            'sideBar' => $this->sideBar,
            'danaMasuk' => $danaMasuk['jumlah'],
            'danaKeluar' => $danaKeluar['jumlah'],
            'saldo' => (int)$danaMasuk['jumlah'] - (int)$danaKeluar['jumlah'],
            'chartDanaMasuk' => $chartDanaMasuk,
            'chartDanaKeluar' => $chartDanaKeluar,
            'kategoriDanaKeluar' => $this->kategoriModel->where('id_jenis', 2)->get()->getResultArray(),
            'month' => $this->request->getVar('month'),
            'now' => TIME::now('Asia/Jakarta')->getYear() . "-" . TIME::now('Asia/Jakarta')->getMonth(),
            'transaksiDanaMasuk' => $transaksiDanaMasuk
        ];

        return view('pages/templateLaporan', $data);


        // $pdf = new Fpdf('P', 'mm', 'A4');
        // $pdf->AddPage();
        // $pdf->SetFont('Arial', 'B', 16);
        // $pdf->Cell(40, 10, 'Hello World!');
        // $pdf->Output();



        $newDoc = new Dompdf();
        $newDoc->loadHtml(view('pages/templateLaporan', $data));

        // (Optional) Setup the paper size and orientation
        $newDoc->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $newDoc->render();

        // Output the generated PDF to Browser
        $newDoc->stream();
    }

    public function createLaporanByDate()
    {

        if ($this->request->getVar('month')) {
            $year = explode("-", $this->request->getVar('month'))[0];
            $month = explode("-", $this->request->getVar('month'))[1];
            $danaMasuk = $this->transaksiModel->sum(1, $year, $month)->get()->getRowArray();
            $danaKeluar = $this->transaksiModel->sum(2, $year, $month)->get()->getRowArray();
            $chartDanaMasuk = $this->transaksiModel->sumByKategori(1, $year, $month)->get()->getResultArray();
            $chartDanaKeluar = $this->transaksiModel->sumByKategori(2, $year, $month)->get()->getResultArray();
        } else {
            $danaMasuk = $this->transaksiModel->sum(1, TIME::now('Asia/Jakarta')->getYear(),  TIME::now('Asia/Jakarta')->getMonth())->get()->getRowArray();
            $danaKeluar = $this->transaksiModel->sum(2, TIME::now('Asia/Jakarta')->getYear(),  TIME::now('Asia/Jakarta')->getMonth())->get()->getRowArray();
            $chartDanaMasuk = $this->transaksiModel->sumByKategori(1, TIME::now('Asia/Jakarta')->getYear(),  TIME::now('Asia/Jakarta')->getMonth())->get()->getResultArray();
            $chartDanaKeluar = $this->transaksiModel->sumByKategori(2, TIME::now('Asia/Jakarta')->getYear(),  TIME::now('Asia/Jakarta')->getMonth())->get()->getResultArray();
        }

        $transaksiDanaMasuk = $this->transaksiModel->getTransaksiByJenis('dana-masuk')->get()->getResultArray();

        $data = [
            'sideBar' => $this->sideBar,
            'danaMasuk' => $danaMasuk['jumlah'],
            'danaKeluar' => $danaKeluar['jumlah'],
            'saldo' => (int)$danaMasuk['jumlah'] - (int)$danaKeluar['jumlah'],
            'chartDanaMasuk' => $chartDanaMasuk,
            'chartDanaKeluar' => $chartDanaKeluar,
            'kategoriDanaKeluar' => $this->kategoriModel->where('id_jenis', 2)->get()->getResultArray(),
            'month' => $this->request->getVar('month'),
            'now' => TIME::now('Asia/Jakarta')->getYear() . "-" . TIME::now('Asia/Jakarta')->getMonth(),
            'transaksiDanaMasuk' => $transaksiDanaMasuk
        ];

        return view('pages/templateLaporan', $data);


        // $pdf = new Fpdf('P', 'mm', 'A4');
        // $pdf->AddPage();
        // $pdf->SetFont('Arial', 'B', 16);
        // $pdf->Cell(40, 10, 'Hello World!');
        // $pdf->Output();



        $newDoc = new Dompdf();
        $newDoc->loadHtml(view('pages/templateLaporan', $data));

        // (Optional) Setup the paper size and orientation
        $newDoc->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $newDoc->render();

        // Output the generated PDF to Browser
        $newDoc->stream();
    }
}
