<div class="container-fluid bg-transparent">
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="<?= base_url('/'); ?>" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                    <span class="text-primary font-weight-bold border px-3 mr-1">Aman</span>
                    <span class="text-white">Banget</span>
                </h1>
                <p class="tagline text-white-50 mt-1" style="font-size: 14px; letter-spacing: 1px;">Sewa mobil mudah & aman</p>
            </a>
        </div>
        
        <div class="col-lg-6 col-6 text-left">
            &nbsp;
        </div>

        <div class="col-lg-3 col-6 text-right">
            <a href="<?= base_url('cart') ?>" class="btn border border-secondary" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(5px);">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge text-white"><?= (isset($jmlitem)) ? $jmlitem : 0; ?></span>
            </a>
        </div>
    </div>
</div>