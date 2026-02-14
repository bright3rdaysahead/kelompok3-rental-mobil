<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\ShippingModel;
use App\Models\ItemModel;

class Cart extends BaseController
{
    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->to(base_url('login'));
        }

        $kategori = new KategoriModel();
        $transaksi = new TransaksiModel();
        $detail = new DetailTransaksiModel();

        $data['kat'] = $kategori->findAll();
        $userID = session()->get('id_user');

        $cek = $transaksi->cek_data($userID);
        $idTransaksi = $cek ? $cek['id_transaksi'] : 0;

        $data['detail'] = $detail->getItemsWithDetail($idTransaksi);
        $data['jmlitem'] = $detail->countDataWithCriteria($idTransaksi);
        
        $data['statushalaman'] = 'cart';
        $data['nama_aktif'] = 'Keranjang';

        echo view('part/header');
        echo view('part/topbar', $data);
        echo view('part/navbar', $data);
        echo view('cart', $data);
        echo view('part/footer');
    }

    public function tambahCart()
    {
        if (!session()->get('username')) {
            return redirect()->to(base_url('login'));
        }

        $transaksi = new TransaksiModel();
        $detail = new DetailTransaksiModel();
        $userID = session()->get('id_user');

        $idItem = $this->request->getPost('id_item');
        $tgl_sewa = $this->request->getPost('tgl_sewa');
        $tgl_kembali = $this->request->getPost('tgl_kembali');

        $start = strtotime($tgl_sewa);
        $end = strtotime($tgl_kembali);

        $lama_hari = ceil(($end - $start) / (60 * 60 * 24));
        if ($lama_hari <= 0) { $lama_hari = 1; }

        $cek = $transaksi->cek_data($userID);

        if ($cek) {
            $idTransaksi = $cek['id_transaksi'];
        } else {
            $transaksi->insert([
                "tgl_transaksi" => date('Y-m-d'),
                "id_user" => $userID,
                "status" => "awal"
            ]);
            $idTransaksi = $transaksi->insertID();
        }

        $detail->insert([
            "id_transaksi" => $idTransaksi,
            "id_item" => $idItem,
            "tgl_sewa" => $tgl_sewa,
            "tgl_kembali" => $tgl_kembali,
            "lama_hari" => $lama_hari
        ]);

        return redirect('cart');
    }

    public function delete($id)
    {
        $detail = new DetailTransaksiModel();
        $detail->delete($id);
        return redirect('cart');
    }

    public function checkout()
    {
        if (!session()->get('username')) {
            return redirect()->to(base_url('login'));
        }

        $kategori = new KategoriModel();
        $transaksi = new TransaksiModel();
        $detail = new DetailTransaksiModel();

        $data['kat'] = $kategori->findAll();
        $userID = session()->get('id_user');

        $cek = $transaksi->cek_data($userID);
        $idTransaksi = $cek ? $cek['id_transaksi'] : 0;

        $data['detail'] = $detail->getItemsWithDetail($idTransaksi);
        $data['jmlitem'] = $detail->countDataWithCriteria($idTransaksi);
        $data['idtrans'] = $idTransaksi;
        
        $data['statushalaman'] = 'checkout';

        echo view('part/header');
        echo view('part/topbar', $data);
        echo view('part/navbar', $data);
        echo view('checkout', $data);
        echo view('part/footer');
    }

    public function finishTrans($id_transaksi)
    {
        $transaksiModel = new TransaksiModel();
        $shippingModel = new ShippingModel();

        // 1. Ambil data dari form (Pastikan name di checkout.php sesuai)
        $total_bayar = $this->request->getPost('total_bayar') ?? 0;
        $metode      = $this->request->getPost('payment') ?? 'Belum Pilih';
        $no_ktp      = $this->request->getPost('no_ktp') ?? '';
        $no_sim      = $this->request->getPost('no_sim') ?? '';

        // 2. Update tbl_transaksi
        // Status diubah ke 'belum dibayar' agar langsung muncul di riwayat
        $data_update = [
            'total_bayar'       => $total_bayar,
            'metode_pembayaran' => $metode,
            'status'            => 'belum dibayar' 
        ];
        
        $transaksiModel->update($id_transaksi, $data_update);

        // 3. Simpan data tambahan ke tbl_shipping
        $data_shipping = [
            'id_transaksi' => $id_transaksi,
            'nama_lengkap' => $this->request->getPost('nama_lengkap') ?? '',
            'email'        => $this->request->getPost('email') ?? '',
            'no_hp'        => $this->request->getPost('no_hp') ?? '',
            'alamat'       => $this->request->getPost('alamat') ?? '',
            'kota'         => $no_ktp,
            'kodepos'      => $no_sim
        ];
        
        $shippingModel->insert($data_shipping);

        // 4. Redirect ke riwayat sewa user (Sesuai rute yang sudah kita perbaiki)
        return redirect()->to(base_url('riwayat'))->with('success', 'Pesanan berhasil dibuat, silakan cek menu riwayat!');
    }
}