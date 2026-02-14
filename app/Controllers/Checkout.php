<?php

namespace App\Controllers;

class Checkout extends BaseController
{
    public function index()
    {
        echo view('part/header');
        echo view('part/topbar');
        echo view('part/navbar');
        echo view('checkout'); // Memanggil file view checkout.php
        echo view('part/footer');
    }
}