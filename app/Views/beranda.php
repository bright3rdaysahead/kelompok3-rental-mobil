<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="display-4 font-weight-bold text-white" style="text-shadow: 2px 2px 10px rgba(0,0,0,0.7);">Mostly Pick</h2>
    </div>

    <div class="row px-xl-5 pb-3">
        <?php foreach ($terlaris as $brglist): ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4" 
                 style="background: rgba(255, 255, 255, 0.25); 
                        backdrop-filter: blur(15px); 
                        -webkit-backdrop-filter: blur(15px); 
                        border-radius: 20px; 
                        overflow: hidden; 
                        border: 1px solid rgba(255, 255, 255, 0.4); 
                        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);">
                
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border-0 p-0">
                    <img class="img-fluid w-100" src="<?= base_url('file_gambar/'.$brglist->gambar); ?>" alt="<?= esc($brglist->nama_barang); ?>">
                </div>
                
                <div class="card-body text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-2 font-weight-bold text-white" style="text-shadow: 1px 1px 5px rgba(0,0,0,0.3);"><?= esc($brglist->nama_barang); ?></h6>
                    
                    <div class="d-flex flex-column">
                        <?php if ($brglist->total_stok > 0): ?>
                            <small class="text-success font-weight-bold">Siap Disewa</small>
                            <small class="text-white"><?= $brglist->total_stok; ?> Unit Tersedia</small>
                        <?php else: ?>
                            <small class="text-danger font-weight-bold">Tidak Tersedia</small>
                            <small class="text-white opacity-75">Habis Terpesan</small>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card-footer bg-transparent border-0 text-center pb-4">
                    <?php if ($brglist->total_stok > 0): ?>
                        <a href="<?= base_url('KategoriMobil/detail/'.$brglist->kode_barang); ?>" class="btn btn-sm btn-primary px-4 shadow-sm" style="border-radius: 50px;">
                            <i class="fas fa-car mr-1"></i> Lihat Detail
                        </a>
                    <?php else: ?>
                        <button class="btn btn-sm btn-secondary px-4" disabled style="cursor: not-allowed; border-radius: 50px; opacity: 0.7;">Habis Terpesan</button>
                    <?php endif; ?>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .product-item {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .product-item:hover {
        transform: translateY(-12px);
        background: rgba(255, 255, 255, 0.35) !important;
        box-shadow: 0 15px 45px 0 rgba(0, 0, 0, 0.4) !important;
        border: 1px solid rgba(255, 255, 255, 0.6) !important;
    }

    .product-item img {
        transition: transform 0.6s ease;
    }

    .product-item:hover img {
        transform: scale(1.1);
    }

    .display-4 {
        font-size: 3.5rem;
        letter-spacing: 1px;
    }

    .container-fluid.pt-5 {
        background: transparent !important;
    }
    
    /* Memastikan teks putih memiliki sedikit shadow agar terbaca jika background gambar terang */
    .text-white {
        text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
    }
</style>