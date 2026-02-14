<!-- DAFTAR MOBIL START -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5">
            <span class="px-2">Daftar Mobil</span>
        </h2>
        <p class="text-muted">Pilih mobil sesuai kebutuhan perjalanan Anda</p>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php foreach ($brg as $brglist): ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">

                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100"
                         src="<?= base_url('file_gambar/'.$brglist->gambar); ?>"
                         alt="<?= esc($brglist->nama_barang); ?>">
                </div>

                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-2">
                        <?= esc($brglist->nama_barang); ?>
                    </h6>
                    
                    <?php if ($brglist->stok > 0): ?>
                        <small class="text-success font-weight-bold">Siap disewa</small>
                    <?php else: ?>
                        <small class="text-danger font-weight-bold">Tidak Tersedia (Stok Habis)</small>
                    <?php endif; ?>
                </div>

                <div class="card-footer bg-light border text-center">
                    <?php if ($total_stok > 0): ?>
                        <a href="<?= base_url('KategoriMobil/detail/' . $value['kode_barang']); ?>" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-info-circle mr-1"></i>Lihat Detail
                        </a>
                    <?php else: ?>
                        <button class="btn btn-sm btn-secondary" disabled>
                            <i class="fas fa-times-circle mr-1"></i>Habis Terpesan
                        </button>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- DAFTAR MOBIL END -->
