<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('assets/gambar/logoptrmu.png')?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8;">
      <span class="brand-text font-weight-light"><strong>PT RMU - HRIS</strong></span>
    </a>  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/staff_foto/'.$this->session->userdata('gambar')) ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('nama_lengkap') ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
            <!-- QUERY MENU -->
          <?php 
          $role_id = $this->session->userdata('role_id');
          $queryMenu = "SELECT `user_menu`.`id`, `menu`
          FROM `user_menu` JOIN `user_access_menu`
          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
          WHERE `user_access_menu`.`role_id` = $role_id 
          ORDER BY `user_access_menu`.`menu_id` ASC";
          $menu = $this->db->query($queryMenu)->result_array();
          ?>
    
    <?php foreach($menu as $m) : ?>
   
    <?php 
    $menuId = $m['id'];
      $querySubMenu = "SELECT * FROM `user_sub_menu` 
      WHERE `menu_id` = $menuId
      AND `is_active` = 1"; 
      $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>

      <?php foreach ($subMenu as $sm) : ?>
        <li class="nav-item">
          <?php if ($sm['title'] == $title) : ?>
            <a href="<?= base_url($sm['url']) ?>" class="nav-link active">
            <?php else : ?>
              <a href="<?= base_url($sm['url']) ?>" class="nav-link">
            <?php endif; ?> 
            <?= $sm['icon'] ?> 
              <p>
              <?= $sm['title'] ?>
              <?php if ($sm['title'] == "Data Administrasi") { ?>
                <i class="fas fa-angle-left right"></i>
              <?php }else if($sm['title'] == "Menu Manajemen"){ ?>
                <i class="fas fa-angle-left right"></i>
                <?php } ?>
              </p>
            </a>
            <?php if($sm['title'] == "Data Administrasi"){ ?>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Dashboard/daftar_asuransi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Asuransi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('Dashboard/daftar_bank') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bank</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('Dashboard/daftar_keluarga') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Keluarga</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('Dashboard/daftar_ktp') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data KTP</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('Dashboard/daftar_kontrak_staff') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kontrak</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="<?= base_url('Dashboard/daftar_npwp') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data NPWP</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="<?= base_url('Dashboard/daftar_penilaian_kerja') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Penilaian Kerja</p>
                </a>
              </li>              
            </ul>
                   <?php }else if($sm['title'] == "Menu Manajemen"){ ?>
                    <ul class="nav nav-treeview">

                    <li class="nav-item">
                <a href="<?= base_url('Menu_Manajemen/user_role') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> User Role</p>
                </a>
              </li>  
              
                    <li class="nav-item">
                <a href="<?= base_url('Menu_manajemen/user_menu') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Menu</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('Menu_Manajemen/user_submenu') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> User Submenu</p>
                </a>
              </li>  

                
            </ul>
                    <?php } ?>
            </li>
        <?php endforeach; ?>

        <?php endforeach; ?>
        <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>