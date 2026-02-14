<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new KategoriModel();
        // Mengubah nama key menjadi 'kategori' agar sesuai dengan looping foreach ($kategori as $row) di view
        $data['kategori'] = $model->findAll(); 
        
        echo view('part_adm/header');
        echo view('part_adm/top_menu', $data);
        echo view('part_adm/side_menu', $data);
        echo view('kategori', $data);
        echo view('part_adm/footer');
    }

    public function tambah()
    {
        $validation = \Config\Services::validation();
        $validation->setRules(['nama_kategori' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $model = new KategoriModel();
            $model->insert([
                "nama_kategori" => $this->request->getPost('nama_kategori')
            ]);
            return redirect()->to(base_url('kategori'));
        }

        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('kategori_add');
        echo view('part_adm/footer');
    }

    public function edit($id)
    {
        $model = new KategoriModel();
        // Pastikan id_kategori sesuai dengan primary key di database Anda
        $data['kategori'] = $model->where('id_kategori', $id)->first();

        if (!$data['kategori']) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_kategori' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $model->update($id, [
                "nama_kategori" => $this->request->getPost('nama_kategori')
            ]);
            return redirect()->to(base_url('kategori'));
        }

        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('kategori_edit', $data);
        echo view('part_adm/footer');
    }

    public function delete($id)
    {
        $model = new KategoriModel();
        $model->delete($id);
        return redirect()->to(base_url('kategori'));
    }
}