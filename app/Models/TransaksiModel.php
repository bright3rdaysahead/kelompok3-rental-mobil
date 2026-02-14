<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useAutoIncrement = true;

    // UPDATE: Menambahkan kolom total_bayar dan metode_pembayaran agar bisa disimpan
    protected $allowedFields = [
        'tgl_transaksi', 
        'id_user', 
        'status', 
        'total_bayar', 
        'metode_pembayaran'
    ];

    public function detail()
    {
        return $this->hasMany(DetailTransaksiModel::class, 'id_transaksi');
    }

    public function cek_data($id_user)
    {
      return $this->db->table('tbl_transaksi')
      ->where(array('id_user' => $id_user, 'status' => 'awal'))
      ->get()->getRowArray();
    }

    public function cek_transaksi($id)
    {
        return $this->select("
            tbl_transaksi.id_transaksi,
            tbl_user.username,
            tbl_transaksi.tgl_transaksi,
            tbl_transaksi.total_bayar,
            tbl_transaksi.metode_pembayaran")
      ->join('tbl_user', 'tbl_transaksi.id_user = tbl_user.id_user')
      ->where('tbl_transaksi.id_transaksi', $id)
      ->first();   
    }

    public function getDataWithUser()
    {
        // UPDATE: Langsung mengambil kolom total_bayar dari tabel transaksi
        // supaya performa lebih cepat dan tidak perlu SUM manual setiap kali load
        return $this->select("
            tbl_transaksi.id_transaksi,
            tbl_user.username,
            tbl_transaksi.tgl_transaksi,
            tbl_transaksi.total_bayar,
            tbl_transaksi.metode_pembayaran,
            tbl_transaksi.status
        ")
        ->join('tbl_user', 'tbl_transaksi.id_user = tbl_user.id_user')
        ->orderBy('tbl_transaksi.id_transaksi', 'DESC')
        ->findAll();
    }
}