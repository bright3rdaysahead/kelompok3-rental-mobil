<div class="row px-xl-5 pb-3">
    <?php foreach ($brg as $brglist): ?>
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="card product-item border-0 mb-4 shadow-sm" style="background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(8px); border-radius: 20px; overflow: hidden; transition: transform 0.3s;">
            
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border-0 p-0">
                <img class="img-fluid w-100" src="<?= base_url('file_gambar/'.$brglist['gambar']); ?>" alt="<?= esc($brglist['nama_barang']); ?>" style="transition: scale 0.5s;">
            </div>
            
            <div class="card-body text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-2 text-white font-weight-bold" style="letter-spacing: 0.5px;"><?= esc($brglist['nama_barang']); ?></h6>
                
                <div class="d-flex flex-column">
                    <?php if ($brglist['total_stok'] > 0): ?>
                        <small class="text-primary font-weight-bold">Siap Disewa</small>
                        <small class="text-white-50"><?= $brglist['total_stok']; ?> Unit Tersedia</small>
                    <?php else: ?>
                        <small class="text-danger font-weight-bold">Tidak Tersedia</small>
                        <small class="text-white-50">0 Unit Tersedia</small>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-footer bg-transparent border-0 text-center pb-4">
                <?php if ($brglist['total_stok'] > 0): ?>
                    <a href="<?= base_url('KategoriMobil/detail/'.$brglist['kode_barang']); ?>" class="btn btn-sm btn-primary px-4 shadow-sm" style="border-radius: 50px;">
                        <i class="fas fa-car mr-1"></i> Lihat Detail
                    </a>
                <?php else: ?>
                    <button class="btn btn-sm btn-secondary px-4 shadow-sm" disabled style="cursor: not-allowed; border-radius: 50px; opacity: 0.6;">Habis Terpesan</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<style>
    .product-item:hover {
        transform: translateY(-10px); /* Kartu naik sedikit saat disentuh */
    }
    .product-item:hover img {
        transform: scale(1.1); /* Gambar zoom halus saat hover */
    }
</style>