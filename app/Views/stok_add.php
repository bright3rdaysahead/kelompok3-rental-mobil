<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Tambah Stok Unit</h1>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Stok</h3>
            </div>
            <form action="" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Mobil</label>
                        <select name="kode_barang" class="form-control" required>
                            <?php foreach($mobil as $m): ?>
                                <option value="<?= $m['kode_barang'] ?>"><?= $m['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Warna</label>
                        <input type="text" class="form-control" name="warna" placeholder="Warna Mobil" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="number" class="form-control" name="stok" value="1" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga per hari" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>