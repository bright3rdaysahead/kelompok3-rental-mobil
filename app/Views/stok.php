<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Kelola Stok Mobil</h1>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('stok/tambah') ?>" class="btn btn-sm btn-outline-secondary">Tambah Stok</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mobil</th>
                            <th>Warna</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($stok as $s): ?>
                        <tr>
                            <td><?= $s['nama_barang'] ?> (<?= $s['kode_barang'] ?>)</td>
                            <td><?= $s['warna'] ?></td>
                            <td><?= $s['stok'] ?></td>
                            <td>Rp <?= number_format($s['harga'], 0, ',', '.') ?></td>
                            <td>
                                <a href="<?= base_url('stok/'.$s['id_item'].'/edit') ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <a href="#" data-href="<?= base_url('stok/'.$s['id_item'].'/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="h2">Anda yakin?</h2>
                <p>Data stok unit ini akan dihapus permanen.</p>
            </div>
            <div class="modal-footer">
                <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
function confirmToDelete(el){
    $("#delete-button").attr("href", el.dataset.href);
    $("#confirm-dialog").modal('show');
}
</script>