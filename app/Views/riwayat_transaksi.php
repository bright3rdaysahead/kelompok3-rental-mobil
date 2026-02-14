<style>
    /* Hilangkan background putih pada container utama agar wallpaper terlihat */
    .container-fluid.pt-5 {
        background: transparent !important;
    }

    /* Mengubah judul menjadi putih dengan shadow agar terbaca di bg gelap */
    .font-weight-semi-bold.text-center {
        color: #ffffff !important;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.8);
        letter-spacing: 2px;
    }

    /* Efek Glassmorphism pada Tabel */
    .table-responsive {
        background: rgba(0, 0, 0, 0.4) !important; /* Gelap transparan */
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 25px !important;
        padding: 20px;
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
    }

    .table {
        color: #ffffff !important;
        border-collapse: separate;
        border-spacing: 0 10px; /* Memberi jarak antar baris */
    }

    /* Header Tabel */
    .table thead th {
        background: rgba(255, 255, 255, 0.1) !important;
        color: #ffffff !important;
        border: none !important;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
    }

    /* Baris Tabel */
    .table tbody tr {
        background: rgba(255, 255, 255, 0.05);
        transition: 0.3s;
    }

    .table tbody tr:hover {
        background: rgba(255, 255, 255, 0.15); /* Efek highlight saat cursor di atas baris */
    }

    .table td {
        border: none !important;
        padding: 15px !important;
    }

    /* Badge Status */
    .badge {
        padding: 8px 12px;
        border-radius: 10px;
    }
    
    .badge-success { background-color: rgba(40, 167, 69, 0.7) !important; }
    .badge-danger { background-color: rgba(220, 53, 69, 0.7) !important; }

    /* Tombol Aksi */
    .btn-sm {
        border-radius: 10px;
        font-weight: 600;
        padding: 5px 15px;
    }
</style>

<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <h4 class="font-weight-semi-bold mb-4 text-center">--- Riwayat Sewa Mobil ---</h4>
            <table class="table text-center mb-0">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Tanggal Sewa</th>
                        <th>Total Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php if(empty($riwayat)): ?>
                        <tr><td colspan="5" class="py-4 text-white">Belum ada transaksi.</td></tr>
                    <?php else: ?>
                        <?php foreach($riwayat as $r): ?>
                        <tr>
                            <td class="align-middle" style="font-weight: bold;">#TRX-<?= $r['id_transaksi'] ?></td>
                            <td class="align-middle"><?= date('d M Y', strtotime($r['tgl_transaksi'])) ?></td>
                            <td class="align-middle">Rp <?= number_format($r['total_bayar'], 0, ',', '.') ?></td>
                            <td class="align-middle">
                                <?php if($r['status'] == 'lunas'): ?>
                                    <span class="badge badge-success">Lunas</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Belum Dibayar</span>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle">
                                <a href="<?= base_url('riwayat/invoice/'.$r['id_transaksi']) ?>" class="btn btn-sm btn-primary">Detail</a>
                                
                                <?php if($r['status'] == 'lunas'): ?>
                                    <a href="<?= base_url('riwayat/invoice/'.$r['id_transaksi']) ?>" class="btn btn-sm btn-info ml-1" target="_blank">
                                        <i class="fas fa-file-invoice"></i> Invoice
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>