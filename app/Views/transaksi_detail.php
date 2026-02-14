<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('transaksi'); ?>">Transaksi</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg-light">
                        <h3 class="card-title">Informasi Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <th width="180">ID Transaksi</th>
                                <td>: <?= $transaksi['id_transaksi']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <td>: <?= date('d M Y', strtotime($transaksi['tgl_transaksi'])); ?></td>
                            </tr>
                            <tr>
                                <th>Periode Sewa</th>
                                <td>: <?= date('d M Y', strtotime($detail[0]['tgl_sewa'])); ?> s/d <?= date('d M Y', strtotime($detail[0]['tgl_kembali'])); ?></td>
                            </tr>
                            <tr>
                                <th>Metode Pembayaran</th>
                                <td>: <span class="badge badge-success"><?= $transaksi['metode_pembayaran'] ?? 'N/A'; ?></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg-light">
                        <h3 class="card-title">Identitas Penyewa</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <th width="180">Nama Lengkap</th>
                                <td>: <?= $shipping['nama_lengkap'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <th>No. HP / WhatsApp</th>
                                <td>: <?= $shipping['no_hp'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor KTP</th>
                                <td>: <?= $shipping['kota'] ?? '-'; ?></td> </tr>
                            <tr>
                                <th>Nomor SIM</th>
                                <td>: <?= $shipping['kodepos'] ?? '-'; ?></td> </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: <?= $shipping['alamat'] ?? '-'; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Detail Item Mobil</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item</th>
                            <th>Harga per Hari</th>
                            <th>Lama Hari</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $total = 0;
                            $no = 1;
                            foreach ($detail as $transaksiList):
                                $subtotal = $transaksiList['harga'] * ($transaksiList['lama_hari'] ?? 1);
                                $total += $subtotal;
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $transaksiList['nama_barang']; ?></td>
                            <td>Rp <?= number_format($transaksiList['harga'], 0, ',', '.'); ?></td>
                            <td><?= $transaksiList['lama_hari']; ?> Hari</td>
                            <td>Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-right">Total Biaya yang Harus Dibayar</th>
                            <th class="bg-yellow">Rp <?= number_format($total, 0, ',', '.'); ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer text-right">
                <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Print Invoice</button>
                <a href="<?= base_url('transaksi'); ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </section>
</div>