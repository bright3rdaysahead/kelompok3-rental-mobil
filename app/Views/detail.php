<style>
    /* Reset & Layout */
    .detail-section {
        padding: 80px 0;
        background: #fdf2f8; /* Pink sangat muda sebagai base */
        min-height: 100vh;
    }

    /* Kartu Detail dengan Transparansi Tinggi */
    .glass-detail-card {
        background: rgba(255, 255, 255, 0.4); /* Background lebih transparan */
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(255, 20, 147, 0.05);
    }

    /* Gambar Mobil */
    .img-showcase {
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.4s ease;
    }

    .img-showcase:hover {
        transform: scale(1.03);
    }

    /* Tipografi */
    .car-name {
        font-weight: 800;
        color: #333;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .car-name span {
        color: #ff1493;
    }

    .car-desc {
        color: #666;
        line-height: 1.7;
        font-size: 15px;
    }

    /* Form Elements */
    .label-pos {
        font-weight: 700;
        font-size: 12px;
        color: #444;
        text-transform: uppercase;
        margin-bottom: 8px;
        display: block;
    }

    .input-custom {
        background: rgba(255, 255, 255, 0.8) !important;
        border: 1px solid #eee !important;
        border-radius: 12px !important;
        height: 50px !important;
    }

    /* Tombol Pink */
    .btn-pink-luxury {
        background: #ff1493;
        color: #fff;
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(255, 20, 147, 0.3);
    }

    .btn-pink-luxury:hover {
        background: #333;
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-outline-back {
        border: 1.5px solid #ddd;
        border-radius: 12px;
        color: #777;
        font-weight: 600;
        padding: 10px 25px;
        transition: 0.3s;
    }

    .btn-outline-back:hover {
        background: #eee;
        color: #333;
        text-decoration: none;
    }
</style>

<div class="detail-section">
    <div class="container">
        <div class="glass-detail-card">
            <div class="row align-items-center">
                
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="<?= base_url('file_gambar/' . ($brg['gambar'] ?? 'default.jpg')); ?>" 
                         class="img-fluid img-showcase" 
                         alt="<?= esc($brg['nama_barang'] ?? 'Mobil'); ?>">
                </div>

                <div class="col-md-6">
                    <h2 class="car-name"><?= esc($brg['nama_barang'] ?? 'Nama Mobil'); ?> <span>.</span></h2>
                    
                    <p class="car-desc mb-4">
                        Kendaraan siap digunakan untuk perjalanan Anda. Pastikan memilih warna dan tanggal sewa dengan benar untuk menjamin kenyamanan perjalanan Anda.
                    </p>

                    <hr class="mb-4" style="border-top: 1px solid rgba(0,0,0,0.05);">

                    <form action="<?= base_url('cartAdd') ?>" method="post">
                        <?= csrf_field(); ?>
                        
                        <input type="hidden" name="kode_barang" value="<?= $brg['kode_barang'] ?? ''; ?>">

                        <div class="form-group mb-4">
                            <label class="label-pos">Pilih Warna & Harga Sewa:</label>
                            <select name="id_item" class="form-control input-custom" required>
                                <option value="">-- Pilih Tersedia --</option>
                                <?php foreach($itemlist as $item): ?>
                                    <?php if($item['stok'] > 0): ?>
                                        <option value="<?= $item['id_item'] ?>">
                                            <?= esc($item['warna']) ?> - Rp <?= number_format($item['harga'], 0, ',', '.') ?> / Hari
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">
                                <label class="label-pos">Tanggal Sewa:</label>
                                <input type="date" name="tgl_sewa" class="form-control input-custom" required min="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-6">
                                <label class="label-pos">Tanggal Kembali:</label>
                                <input type="date" name="tgl_kembali" class="form-control input-custom" required min="<?= date('Y-m-d') ?>">
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-pink-luxury btn-lg mr-3">
                                <i class="fa fa-calendar-check mr-2"></i> BOOK NOW
                            </button>
                            <a href="<?= base_url('kategorimobil') ?>" class="btn btn-outline-back btn-lg">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>