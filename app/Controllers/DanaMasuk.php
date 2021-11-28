<?php

namespace App\Controllers;

class DanaMasuk extends BaseController
{




    public function index()
    {

        $data = [
            'sideBar' => $this->sideBar

        ];

        return view('danaMasuk/regular', $data);
    }

    public function nonregular()
    {
        $data = [
            'sideBar' => $this->sideBar

        ];
        return view('danaMasuk/non-regular', $data);
    }

    public function laboratorium()
    {
        $data = [
            'sideBar' => $this->sideBar

        ];
        return view('danaMasuk/laboratorium', $data);
    }
}
