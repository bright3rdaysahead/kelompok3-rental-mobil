<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\ShippingModel;

class Transaksi extends BaseController
{
    public function index()
    {
        $transaksi = new TransaksiModel();
        
        // 1. Ambil data dengan status 'belum dibayar' agar admin bisa memprosesnya
        // Tambahkan juga 'lunas' jika ingin semua riwayat muncul di tabel admin
        $data['transaksi'] = $transaksi->whereIn('status', ['belum dibayar', 'lunas'])
                                       ->orderBy('id_transaksi', 'DESC')
                                       ->getDataWithUser(); 

        echo view('part_adm/header');
        echo view('part_adm/top_menu', $data);
        echo view('part_adm/side_menu', $data);
        echo view('transaksi', $data);
        echo view('part_adm/footer');
    }

    public function detail($id)
    {
        $transaksi = new TransaksiModel();
        $detail = new DetailTransaksiModel();
        $shipping = new ShippingModel();
        
        $data['transaksi'] = $transaksi->cek_transaksi($id);
        $data['detail'] = $detail->getItemsWithDetail($id);
        $data['shipping'] = $shipping->where('id_transaksi', $id)->first();
        
        echo view('part_adm/header');
        echo view('part_adm/top_menu', $data);
        echo view('part_adm/side_menu', $data);
        echo view('transaksi_detail', $data);
        echo view('part_adm/footer');
    }

    // --- FUNGSI BARU UNTUK KONFIRMASI PEMBAYARAN ---
    public function konfirmasi($id)
    {
        $transaksiModel = new TransaksiModel();

        // 2. Update status ke 'lunas' agar nominal muncul dan badge jadi hijau di user
        $transaksiModel->update($id, [
            'status' => 'lunas'
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->to(base_url('transaksi'))->with('success', 'Transaksi #TRX-'.$id.' berhasil dilunasi!');
    }
}