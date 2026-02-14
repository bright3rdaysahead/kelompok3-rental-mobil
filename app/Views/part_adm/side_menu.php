<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('dashboard') ?>" class="brand-link">
      <img src="<?= base_url('template/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('template/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
              <a href="<?= base_url('admin/feedback'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-envelope"></i>
                  <p>Feedback Pelanggan</p>
              </a>
          </li>

          <?php if (session()->get('hak_akses') == 'admin') { ?>
          <li class="nav-item">
            <a href="kategori" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Kategori</p>
            </a>
          </li>
          <?php } ?>

          <li class="nav-item">
                    <a href="<?= base_url('/barang'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Mobil
                        </p>
                    </a>
            </li>
          <li class="nav-item">
            <a href="<?= base_url('stok') ?>" class="nav-link">
                <i class="nav-icon fas fa-boxes"></i>
                <p>Stok Mobil</p>
            </a>
          </li>
            <li class="nav-item">
                    <a href="<?= base_url('/transaksi'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Riwayat Transaksi
                        </p>
                    </a>
            </li>

          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Log Out</p>
            </a>
          </li>
          </ul>
      </nav>
      </div>
    </aside>