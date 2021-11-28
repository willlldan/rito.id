<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'sideBar' => $this->sideBar
        ];


        return view('pages/home', $data);
    }
}
