<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Transaksi Penyewaan</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>User</th>
                            <th>Tanggal</th>
                            <th>Total Bayar</th>
                            <th>Metode</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $transaksiList): ?>
                            <tr>
                                <td class="text-center">#TRX-<?= $transaksiList['id_transaksi']; ?></td>
                                <td><?= $transaksiList['username']; ?></td>
                                <td><?= date('d M Y', strtotime($transaksiList['tgl_transaksi'])); ?></td>
                                <td><strong>Rp <?= number_format($transaksiList['total_bayar'] ?? 0, 0, ',', '.'); ?></strong></td>
                                <td class="text-center">
                                    <span class="badge badge-info">
                                        <?= $transaksiList['metode_pembayaran'] ?? 'N/A'; ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <?php if ($transaksiList['status'] == 'lunas'): ?>
                                        <span class="badge badge-success">Lunas</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Belum Dibayar</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('transaksi/detail/' . $transaksiList['id_transaksi']); ?>"
                                           class="btn btn-sm btn-outline-secondary" title="Lihat Detail">
                                           <i class="fas fa-eye"></i> Detail
                                        </a>

                                        <?php if ($transaksiList['status'] == 'belum dibayar'): ?>
                                            <a href="<?= base_url('transaksi/konfirmasi/' . $transaksiList['id_transaksi']); ?>"
                                               class="btn btn-sm btn-success" 
                                               onclick="return confirm('Apakah Anda yakin ingin mengonfirmasi lunas transaksi ini?')">
                                               <i class="fas fa-check"></i> Konfirmasi Lunas
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>