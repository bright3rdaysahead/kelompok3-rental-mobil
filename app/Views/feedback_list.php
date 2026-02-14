<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Feedback Pelanggan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pesan dari Pengunjung Website</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pesan</th>
                                <th>Tanggal</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($feedback as $f) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= esc($f['nama']); ?></td>
                                <td><?= esc($f['email']); ?></td>
                                <td><?= esc($f['pesan']); ?></td>
                                <td><?= date('d M Y, H:i', strtotime($f['tanggal'])); ?></td>
                                <td>
                                    <a href="<?= base_url('admin/feedback/delete/' . $f['id_feedback']); ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                </div>
        </div>
    </section>
</div>