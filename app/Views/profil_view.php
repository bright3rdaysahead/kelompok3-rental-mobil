<div class="container-fluid pt-5">
    <div class="row px-xl-5 justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-5 border-right text-center">
                            <h4 class="font-weight-bold mb-4 text-dark text-uppercase">Profil Akun</h4>
                            <div class="mb-4">
                                <i class="fas fa-user-circle fa-10x text-light"></i>
                            </div>
                            <h5 class="font-weight-bold mb-1"><?= $user['nama_user'] ?></h5>
                            <span class="badge badge-success px-3 py-2">Member Rental Mobil</span>
                        </div>

                        <div class="col-md-7">
                            <div class="pl-md-4 pt-4 pt-md-0">
                                <h5 class="mb-4 font-weight-semi-bold border-bottom pb-2">Detail Informasi</h5>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-5 text-muted font-weight-medium">Username</div>
                                    <div class="col-sm-7 font-weight-bold">: <?= $user['username'] ?></div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-5 text-muted font-weight-medium">ID Pelanggan</div>
                                    <div class="col-sm-7 font-weight-bold">: #<?= $user['id_user'] ?></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-5 text-muted font-weight-medium">Status Akun</div>
                                    <div class="col-sm-7 text-success font-weight-bold">: Aktif</div>
                                </div>

                                <hr class="my-4">

                                <div class="d-flex flex-column">
                                    <a href="#" class="btn btn-primary btn-block py-2 mb-3">
                                        <i class="fas fa-user-edit mr-2"></i> Edit Profil
                                    </a>
                                    
                                    <a href="<?= base_url('login/logout') ?>" class="btn btn-outline-danger btn-block py-2">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar (Logout)
                                    </a>
                                </div>

                                <div class="mt-4 text-center text-md-left">
                                    <a href="<?= base_url('/') ?>" class="text-muted small">
                                        <i class="fa fa-arrow-left mr-1"></i> Kembali ke Beranda
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> </div>
            </div>
        </div>
    </div>
</div>