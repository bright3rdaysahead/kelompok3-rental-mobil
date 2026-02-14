<?php

namespace App\Controllers;

use App\Models\BarangModel; // Pastikan model ini ada
use CodeIgniter\Controller;

class Stok extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_item');
        $builder->select('tbl_item.*, tbl_barang.nama_barang');
        $builder->join('tbl_barang', 'tbl_barang.kode_barang = tbl_item.kode_barang');
        $data['stok'] = $builder->get()->getResultArray();

        echo view('part_adm/header');
        echo view('part_adm/top_menu', $data);
        echo view('part_adm/side_menu', $data);
        echo view('stok', $data); 
        echo view('part_adm/footer');
    }

    public function tambah()
    {
        $db = \Config\Database::connect();
        
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_barang' => 'required',
            'warna'       => 'required',
            'stok'        => 'required|numeric',
            'harga'       => 'required|numeric'
        ]);
        
        if ($validation->withRequest($this->request)->run()) {
            $db->table('tbl_item')->insert([
                "kode_barang" => $this->request->getPost('kode_barang'),
                "warna"       => $this->request->getPost('warna'),
                "stok"        => $this->request->getPost('stok'),
                "harga"       => $this->request->getPost('harga')
            ]);
            return redirect('stok');
        }

        $data['mobil'] = $db->table('tbl_barang')->get()->getResultArray();

        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('stok_add', $data);
        echo view('part_adm/footer');
    }

    public function edit($id)
    {
        $db = \Config\Database::connect();
        $data['item'] = $db->table('tbl_item')->where('id_item', $id)->get()->getRowArray();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'warna' => 'required',
            'stok'  => 'required|numeric',
            'harga' => 'required|numeric'
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $db->table('tbl_item')->where('id_item', $id)->update([
                "warna" => $this->request->getPost('warna'),
                "stok"  => $this->request->getPost('stok'),
                "harga" => $this->request->getPost('harga')
            ]);
            return redirect('stok');
        }

        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('stok_edit', $data);
        echo view('part_adm/footer');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $db->table('tbl_item')->where('id_item', $id)->delete();
        return redirect('stok');
    }
}