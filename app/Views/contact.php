<style>
    /* Hilangkan box putih besar di latar belakang */
    .bg-light, 
    .container-fluid.pt-5, 
    .contact-form {
        background: none !important;
    }

    /* Memastikan judul terlihat jelas tanpa box putih */
    .section-title span {
        background: transparent !important;
        color: #ffffff !important;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.8);
    }

    /* Container Glassmorphism yang sudah disesuaikan agar kontras */
    .glass-contact-form {
        background: rgba(0, 0, 0, 0.4) !important; /* Gelap transparan */
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 30px !important;
        padding: 40px;
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.6);
    }

    /* Warna Teks Putih Terang */
    .glass-contact-form label, 
    .contact-info-text, 
    .contact-info-text h5, 
    .contact-info-text p {
        color: #ffffff !important;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    }

    /* Input Box agar terlihat di atas background gelap */
    .glass-contact-form .form-control {
        background: rgba(255, 255, 255, 0.2) !important;
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 12px;
        color: #ffffff !important;
        padding: 12px 15px;
    }

    .glass-contact-form .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7) !important;
    }

    /* Efek saat input diklik */
    .glass-contact-form .form-control:focus {
        background: rgba(255, 255, 255, 0.3) !important;
        border-color: #ffffff;
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
    }
</style>
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Feedback & Contact</span></h2>
    </div>
    
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="glass-contact-form">
                <?php if(session()->getFlashdata('status')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 15px;">
                        <?= session()->getFlashdata('status') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('contact/kirim') ?>" method="post">
                    <?= csrf_field(); ?> 
                    <div class="control-group mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Anda" required />
                    </div>
                    <div class="control-group mb-3">
                        <label>Email Aktif</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Anda" required />
                    </div>
                    <div class="control-group mb-3">
                        <label>Pesan / Feedback</label>
                        <textarea class="form-control" rows="6" name="message" placeholder="Tulis pesan atau feedback di sini..." required></textarea>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" style="border-radius: 12px; font-weight: bold;">
                            <i class="fa fa-paper-plane mr-2"></i>Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5 mb-5 contact-info-text">
            <h5 class="font-weight-semi-bold mb-3 text-white">Hubungi Kami</h5>
            <p>Butuh bantuan cepat atau ingin bertanya ketersediaan unit mobil? Klik tombol di bawah untuk chat langsung dengan admin kami.</p>
            <div class="d-flex flex-column mb-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt mr-3"></i>Kampus Universitas Komputer Indonesia</p>
                <p class="mb-2"><i class="fa fa-envelope mr-3"></i>amanbanget3@mobilerent.id</p>
                <p class="mb-2"><i class="fa fa-phone-alt mr-3"></i>082218244087</p>
            </div>
            
            <a href="https://wa.me/6282218244087?text=Halo%20Admin,%20saya%20ingin%20tanya%20unit" 
                target="_blank" class="btn btn-success py-2 px-4 mt-2" style="border-radius: 12px; font-weight: bold;">
                <i class="fab fa-whatsapp mr-2"></i>Chat via WhatsApp
            </a>
        </div>
    </div>
</div>