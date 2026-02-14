<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Stok Mobil</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Unit: <?= $item['kode_barang'] ?></h3>
            </div>
            
            <form action="" method="post">
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $item['id_item'] ?>" />
                    
                    <div class="form-group">
                        <label>Warna Mobil</label>
                        <input type="text" class="form-control" name="warna" value="<?= $item['warna'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="number" class="form-control" name="stok" value="<?= $item['stok'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Harga Sewa (Rp)</label>
                        <input type="number" class="form-control" name="harga" value="<?= $item['harga'] ?>" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="<?= base_url('stok') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </section>
</div>