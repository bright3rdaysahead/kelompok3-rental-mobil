<div class="container py-5">
    <div class="row">

        <div class="col-md-6">
            <img src="<?= base_url('file_gambar/'.$mobil['gambar']); ?>"
                 class="img-fluid rounded">
        </div>

        <div class="col-md-6">
            <h2><?= esc($mobil['nama_barang']); ?></h2>

            <h3>Rp <?= number_format($mobil['harga'] ?? 0, 0, ',', '.') ?> / Hari</h3>
            <p>Stok Tersedia: <?= $mobil['stok'] ?? 0 ?> Unit</p>
            <p>Warna: <?= $mobil['warna'] ?? '-' ?></p>

            <p class="mt-3">
                Kendaraan siap digunakan untuk perjalanan Anda.
            </p>

            <button class="btn btn-primary mt-3" disabled>
                Sewa Mobil (Coming Soon)
            </button>
        </div>

    </div>
</div>
