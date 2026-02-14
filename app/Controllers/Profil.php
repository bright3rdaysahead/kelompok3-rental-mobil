<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class Profil extends BaseController
{
    public function index()
    {
        // 1. Cek Login
        if (!session()->get('id_user')) {
            return redirect()->to(base_url('login'));
        }

        // 2. Inisialisasi Model yang dibutuhkan
        $kategori = new \App\Models\KategoriModel();
        $transaksi = new \App\Models\TransaksiModel();
        $detail = new \App\Models\DetailTransaksiModel();

        $userID = session()->get('id_user');
        
        // 3. LOGIKA SINKRONISASI KERANJANG (Sama dengan KategoriMobil)
        // Cari transaksi yang statusnya masih di keranjang
        $cek = $transaksi->where('id_user', $userID)
                        ->where('status', 'Keranjang') 
                        ->first();

        // Jika tidak ada status 'Keranjang', coba ambil yang paling baru (opsional)
        if (!$cek) {
            $cek = $transaksi->where('id_user', $userID)
                            ->orderBy('id_transaksi', 'DESC')
                            ->first();
        }

        // Hitung item jika transaksi ditemukan
        $jmlitem = 0;
        if ($cek) {
            $jmlitem = $detail->where('id_transaksi', $cek['id_transaksi'])->countAllResults();
        }

        // 4. Siapkan Data untuk dikirim ke View
        $data = [
            'kat'           => $kategori->findAll(),
            'jmlitem'       => $jmlitem, // Ini yang akan dikirim ke topbar
            'nama_aktif'    => 'Profil Saya',
            'statushalaman' => '', // Agar navbar tidak error
            'user'          => [
                'nama_user' => session()->get('nama_user'),
                'username'  => session()->get('username'),
                'id_user'   => session()->get('id_user'),
            ]
        ];

        // 5. Render View
        echo view('part/header', $data);
        echo view('part/topbar', $data);
        echo view('part/navbar', $data);
        echo view('profil_view', $data); 
        echo view('part/footer');
    }
}