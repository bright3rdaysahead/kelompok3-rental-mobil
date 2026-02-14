<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\KategoriModel;
use App\Models\DetailTransaksiModel;
use App\Models\ShippingModel;

class Riwayat extends BaseController
{
    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->to(base_url('login'));
        }

        $transaksiModel = new TransaksiModel();
        $kategoriModel = new KategoriModel();
        $id_user = session()->get('id_user');

        $data['riwayat'] = $transaksiModel->where('id_user', $id_user)
                                          ->whereIn('status', ['belum dibayar', 'dibayar', 'lunas', 'selesai'])
                                          ->orderBy('id_transaksi', 'DESC')
                                          ->findAll();

        $data['kat'] = $kategoriModel->findAll();
        $data['statushalaman'] = 'riwayat';
        $data['nama_aktif'] = 'Riwayat Transaksi';

        echo view('part/header');
        echo view('part/topbar', $data);
        echo view('part/navbar', $data);
        echo view('riwayat_transaksi', $data); 
        echo view('part/footer');
    }

    // --- TAMBAHAN FITUR CETAK INVOICE ---
    public function invoice($id)
    {
        if (!session()->get('username')) {
            return redirect()->to(base_url('login'));
        }

        $transaksiModel = new TransaksiModel();
        $detailModel    = new DetailTransaksiModel();
        $shippingModel  = new ShippingModel();

        // 1. Ambil data utama transaksi
        $data['transaksi'] = $transaksiModel->cek_transaksi($id);
        
        // 2. Ambil item yang disewa (Mobil, Harga, Lama Sewa)
        $data['items'] = $detailModel->getItemsWithDetail($id);
        
        // 3. Ambil data identitas penyewa (KTP & SIM)
        $data['shipping'] = $shippingModel->where('id_transaksi', $id)->first();

        // Mengirim data ke view khusus cetak
        return view('invoice_print', $data);
    }
}