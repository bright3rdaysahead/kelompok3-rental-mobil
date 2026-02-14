<?php

namespace App\Controllers;

class Detail extends BaseController
{
    public function index()
    {
        echo view('part/header');
        echo view('part/topbar');
        echo view('part/navbar');
        echo view('detail'); // Memanggil file detail.php yang baru dibuat
        echo view('part/footer');
    }
}