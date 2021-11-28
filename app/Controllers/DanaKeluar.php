<?php

namespace App\Controllers;

class DanaKeluar extends BaseController
{
    public function index()
    {

        $data = ['sideBar' => $this->sideBar];
        return view('danaKeluar/visimisi', $data);
    }

    public function pendidikanPengajaran()
    {
        return view('danaKeluar/pendidikanPengajaran');
    }

    public function penelitian()
    {
        return view('danaKeluar/penelitian');
    }

    // Pengabdian pada masyarakat
    public function ppm()
    {
        return view('danaKeluar/ppm');
    }

    // Kegiatan dan Pembinaan Mahasiswa
    public function kpm()
    {
        return view('danaKeluar/kpm');
    }

    // Kesejahteraan Tenaga Pendidik & Kependidikan
    public function ktpk()
    {
        return view('danaKeluar/ktpk');
    }

    // Sarana dan Prasarana
    public function sarpras()
    {
        return view('danaKeluar/sarpras');
    }

    // Kerjasama, Promosi dan Bantuan Sosial
    public function kpbs()
    {
        return view('danaKeluar/kpbs');
    }

    public function pembangunan()
    {
        return view('danaKeluar/pembangunan');
    }


    // Filter

    public function persiapanKegiatan()
    {
        return view('danaKeluar/persiapanKegiatan');
    }
}
