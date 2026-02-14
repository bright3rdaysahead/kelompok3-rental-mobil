<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('kategori/add') ?>" class="btn btn-sm btn-primary">Tambah Kategori</a>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($kategori as $k): ?>
                        <tr>
                            <td><?= $k['id_kategori'] ?></td>
                            
                            <td><?= $k['nama_kategori'] ?></td>
                            
                            <td>
                                <a href="<?= base_url('kategori/'.$k['id_kategori'].'/edit') ?>" 
                                   class="btn btn-sm btn-outline-warning">Edit</a>
                                
                                <a href="#" 
                                   data-href="<?= base_url('kategori/'.$k['id_kategori'].'/delete') ?>" 
                                   onclick="confirmToDelete(this)" 
                                   class="btn btn-sm btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
</div>

<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="h2">Anda yakin?</h2>
                <p>Data akan dihapus secara permanen.</p>
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