<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\FeedbackModel;

class Contact extends BaseController
{
    public function index()
    {
        $kategori = new KategoriModel();
        $transaksi = new TransaksiModel();
        $detail = new DetailTransaksiModel();

        $userID = session()->get('id_user');
        $jmlitem = 0;

        if ($userID) {
            // Sesuai database kamu, status awal keranjang adalah 'awal'
            $cek = $transaksi->where([
                'id_user' => $userID,
                'status'  => 'awal' 
            ])->first();
            
            if ($cek) {
                $jmlitem = $detail->where('id_transaksi', $cek['id_transaksi'])->countAllResults();
            }
        }

        $data = [
            'kat'           => $kategori->findAll(),
            'jmlitem'       => $jmlitem, 
            'nama_aktif'    => 'Contact',
            'statushalaman' => 'contact'
        ];

        echo view('part/header', $data);
        echo view('part/topbar', $data);
        echo view('part/navbar', $data);
        echo view('contact', $data); 
        echo view('part/footer');
    }

    // Ubah nama fungsi menjadi kirim_feedback agar sesuai dengan rute di screenshot
    public function kirim_feedback()
    {
        $model = new FeedbackModel();

        $data = [
            'nama'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'subjek' => $this->request->getPost('subject') ?? 'Feedback Pelanggan', 
            'pesan'  => $this->request->getPost('message'),
        ];

        if ($model->insert($data)) {
            return redirect()->to(base_url('contact'))->with('status', 'Pesan Anda berhasil dikirim!');
        } else {
            return redirect()->to(base_url('contact'))->with('status', 'Gagal mengirim pesan.');
        }
    }
}