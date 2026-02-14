<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\CarouselModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
class Beranda extends BaseController
{
    // ... bagian atas tetap sama ...
    public function index()
    {
        $kategori = new KategoriModel();
        $carousel = new CarouselModel();
        $transaksi = new TransaksiModel();
        $detail = new DetailTransaksiModel();
        $db = \Config\Database::connect(); // Hubungkan database

        // --- PERBAIKAN QUERY TERLARIS ---
        // Kita ambil data dari tbl_barang dan jumlahkan stoknya dari tbl_item
        $data['terlaris'] = $db->table('tbl_barang')
            ->select('tbl_barang.*, SUM(tbl_item.stok) as total_stok')
            ->join('tbl_item', 'tbl_item.kode_barang = tbl_barang.kode_barang', 'left')
            ->groupBy('tbl_barang.kode_barang') // Kunci agar tidak double
            ->limit(4)
            ->get()->getResult(); 
        // --------------------------------

        $data['kat'] = $kategori->findAll();
        $data['crs'] = $carousel->findAll();
        $data['statushalaman'] = "beranda"; 
        
        $userID = session()->get('id_user');
        $cek = $transaksi->cek_data($userID);
        $idTransaksi = $cek ? $cek['id_transaksi'] : 0;
        
        $data['jmlitem'] = $detail->countDataWithCriteria($idTransaksi);

        echo view('part/header', $data);
        echo view('part/topbar', $data);
        echo view('part/navbar', $data);
        echo view('beranda', $data); 
        echo view('part/footer');
    }
}
