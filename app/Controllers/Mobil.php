<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Mobil extends BaseController
{
    public function detail($kode)
    {
        $model = new BarangModel();
        $mobil = $model->where('kode_barang', $kode)->first();

        if (!$mobil) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('mobil_detail', [
            'mobil' => $mobil
        ]);
    }
}
