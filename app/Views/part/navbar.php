<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" 
               data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px; border-radius: 15px 15px 0 0;">
                <h6 class="m-0 text-white font-weight-bold">
                    <?= isset($nama_aktif) ? $nama_aktif : 'Kategori Mobil'; ?>
                </h6>
                <i class="fa fa-angle-down text-white"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border-0 bg-transparent" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1000;">
                <div class="navbar-nav w-100 overflow-hidden glass-sidebar" style="height: 410px; padding: 10px;">
                    <div class="nav-item">
                        <a href="<?= base_url('kategorimobil') ?>" class="nav-item nav-link custom-nav-link text-white">
                            Semua Kategori
                        </a>
                        <?php if (isset($kat) && is_array($kat)): ?>
                            <?php foreach ($kat as $katlist): ?>
                                <a href="<?= base_url('kategorimobil/'.$katlist['id_kategori'].'/view') ?>" class="nav-item nav-link custom-nav-link text-white">
                                    <?= esc($katlist['nama_kategori']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-transparent navbar-light py-3 py-lg-0 px-0">
                <a href="<?= base_url(); ?>" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">Rental</span>
                        <span class="text-white">Mobil</span>
                    </h1>
                </a>
                <button type="button" class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="<?= base_url(); ?>" class="nav-item nav-link nav-top-link text-white <?= (isset($statushalaman) && $statushalaman == 'beranda') ? 'active' : ''; ?>">Home</a>
                        <a href="<?= base_url('/contact'); ?>" class="nav-item nav-link nav-top-link text-white <?= (isset($statushalaman) && $statushalaman == 'contact') ? 'active' : ''; ?>">Contact</a>
                        
                        <?php if (session()->get('username') != ''): ?>
                            <a href="<?= base_url('riwayat'); ?>" class="nav-item nav-link nav-top-link text-white <?= (isset($statushalaman) && $statushalaman == 'riwayat') ? 'active' : ''; ?>">Riwayat Sewa</a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="navbar-nav ml-auto py-0">
                        <?php if (session()->get('username') == ''): ?>
                            <a href="<?= base_url('login') ?>" class="nav-item nav-link nav-top-link text-white">Login</a>
                            <a href="<?= base_url('register') ?>" class="nav-item nav-link nav-top-link text-white">Register</a>
                        <?php else: ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle font-weight-bold text-white glass-user-badge" data-toggle="dropdown">
                                    <i class="fa fa-user text-primary mr-1"></i> Halo, <?= session()->get('username') ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow-lg border-0 m-0 glass-dropdown">
                                    <a href="<?= base_url('profil') ?>" class="dropdown-item">
                                        <i class="fa fa-id-card text-primary mr-2"></i>Profil Saya
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?= base_url('login/logout') ?>" class="dropdown-item text-danger">
                                        <i class="fa fa-sign-out-alt mr-2"></i>Logout
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>

            <?php if (isset($statushalaman) && $statushalaman == 'beranda' && isset($crs)): ?>
                <div id="header-carousel" class="carousel slide mt-2" data-ride="carousel" style="border-radius: 20px; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.2);">
                    <div class="carousel-inner">
                        <?php
                        $statuscrs = 'active'; 
                        foreach($crs as $crslist): ?>
                            <div class="carousel-item <?= $statuscrs; ?>" style="height: 410px;">
                                <img class="img-fluid" src="<?= base_url('file_gambar/'.$crslist['pic_carousel'])?>" alt="Image" style="object-fit: cover; width: 100%; height: 100%;">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="background: rgba(0, 0, 0, 0.4); backdrop-filter: blur(2px);">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h6 class="display-4 text-white font-weight-bold mb-4 text-uppercase" style="text-shadow: 2px 2px 10px rgba(0,0,0,0.8);">
                                            Promo Rental Mobil Terbaru
                                        </h6>
                                        <a href="<?= base_url('kategorimobil') ?>" class="btn btn-primary py-md-3 px-md-5 shadow" style="border-radius: 50px; font-weight: bold;">Sewa Sekarang</a>
                                    </div>
                                </div>
                            </div>
                            <?php $statuscrs = ''; ?>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark glass-control">
                            <span class="carousel-control-prev-icon"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark glass-control">
                            <span class="carousel-control-next-icon"></span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    /* 1. Sidebar Glassmorphism */
    .glass-sidebar {
        background: rgba(255, 255, 255, 0.15) !important;
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-radius: 0 0 20px 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .custom-nav-link {
        transition: all 0.3s ease;
        margin: 5px 8px;
        border-radius: 12px;
        padding: 10px 20px !important;
        font-weight: 500;
    }

    .custom-nav-link:hover, .custom-nav-link.active {
        background: rgba(255, 255, 255, 0.3) !important;
        color: #ffffff !important;
        font-weight: 800 !important;
        transform: translateX(5px);
    }

    /* 2. Top Navigation Styling */
    .nav-top-link {
        margin: 0 5px;
        border-radius: 10px;
        transition: all 0.3s;
    }

    .nav-top-link:hover, .nav-top-link.active {
        background: rgba(255, 255, 255, 0.2);
        font-weight: bold;
    }

    /* 3. User Badge & Dropdown */
    .glass-user-badge {
        background: rgba(255, 255, 255, 0.1);
        padding: 8px 20px !important;
        border-radius: 50px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .glass-dropdown {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        overflow: hidden;
    }

    /* 4. Carousel Controls */
    .glass-control {
        width: 45px; 
        height: 45px; 
        border-radius: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center;
        background: rgba(0,0,0,0.3) !important;
        border: 1px solid rgba(255,255,255,0.3) !important;
        backdrop-filter: blur(5px);
    }

    /* Global Text Shadow for white text */
    .text-white {
        text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }
</style>