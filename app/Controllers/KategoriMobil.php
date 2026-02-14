<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\BarangModel;
use App\Models\ItemModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class KategoriMobil extends BaseController
{
    protected $kategori;
    protected $barang;
    protected $item;
    protected $transaksi;
    protected $detail;

    public function __construct()
    {
        $this->kategori = new KategoriModel();
        $this->barang = new BarangModel();
        $this->item = new ItemModel();
        $this->transaksi = new TransaksiModel();
        $this->detail = new DetailTransaksiModel();
    }

    private function getCommonData()
    {
        $userID = session()->get('id_user');
        
        // 1. Coba cari transaksi yang statusnya 'Keranjang'
        $cek = $this->transaksi->where('id_user', $userID)
                               ->where('status', 'Keranjang') 
                               ->first(); 

        // 2. Jika tidak ketemu dengan status 'Keranjang', ambil transaksi paling baru milik user
        // Ini sebagai cadangan jika status di DB kamu tulisannya berbeda
        if (!$cek) {
            $cek = $this->transaksi->where('id_user', $userID)
                                   ->orderBy('id_transaksi', 'DESC')
                                   ->first();
        }

        if ($cek) {
            $idTransaksi = $cek['id_transaksi'];
            // Hitung jumlah baris di detail transaksi agar sinkron dengan ikon keranjang
            $jmlitem = $this->detail->where('id_transaksi', $idTransaksi)->countAllResults();
        } else {
            $jmlitem = 0;
        }

        return [
            'kat' => $this->kategori->findAll(),
            'jmlitem' => $jmlitem, // Sinkronisasi angka keranjang di topbar
            'statushalaman' => ""
        ];
    }

    public function index()
    {
        $data = $this->getCommonData();
        $data['nama_aktif'] = "Semua Kategori"; 

        // Ambil semua mobil dengan total stok
        $data['brg'] = $this->barang->select('tbl_barang.*, SUM(tbl_item.stok) as total_stok')
            ->join('tbl_item', 'tbl_item.kode_barang = tbl_barang.kode_barang', 'left')
            ->groupBy('tbl_barang.kode_barang')
            ->findAll();

        return $this->renderView('kategorimobil', $data);
    }

    public function view($id = null)
    {
        $data = $this->getCommonData();
        
        // Ambil nama kategori untuk teks di tombol kategori
        $katDipilih = $this->kategori->find($id);
        $data['nama_aktif'] = $katDipilih ? $katDipilih['nama_kategori'] : "Kategori";

        // Filter mobil berdasarkan kategori dan hitung total stok
        $data['brg'] = $this->barang->select('tbl_barang.*, SUM(tbl_item.stok) as total_stok')
            ->join('tbl_item', 'tbl_item.kode_barang = tbl_barang.kode_barang', 'left')
            ->where('tbl_barang.id_kategori', $id)
            ->groupBy('tbl_barang.kode_barang')
            ->findAll();

        return $this->renderView('kategorimobil', $data);
    }

    public function detail($kode = null)
    {
        $data = $this->getCommonData();
        $data['nama_aktif'] = "Detail Mobil";

        $data['brg'] = $this->barang->where('kode_barang', $kode)->first();

        if (!$data['brg']) {
            return redirect()->to(base_url('KategoriMobil'));
        }

        $data['itemlist'] = $this->item->where('kode_barang', $kode)->findAll();

        return $this->renderView('detail', $data);
    }

    private function renderView($viewName, $data)
    {
        echo view('part/header');
        echo view('part/topbar', $data);
        echo view('part/navbar', $data);
        echo view($viewName, $data);
        echo view('part/footer');
    }
}
