<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-4">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
         </div>
</div>
</div>
        </div>
        <a class="btn btn-primary" data-toggle="modal" data-target="#tambahusersubmenuModal"><i class="fas fa-plus"></i> Tambah User Submenu</a>
      </div>
 </div>

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Submenu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="user-submenu">
                <table id="bloodType_table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Submenu</th>
                    <th>Menu</th>
                    <th>Url</th>
                    <th>Icon</th>
                    <th>Aktif?</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($user_submenu as $data) : ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['title'] ?></td>
                    <td><?= $data['menu'] ?></td>
                    <td><?= $data['url'] ?></td>
                    <td><?= $data['icon'] ?></td>
                    <td>
                        <?php if($data['is_active'] == 1) { ?>
                            <span class="badge rounded-pill bg-success">Aktif</span>    
                        <?php }else{ ?>
                            <span class="badge rounded-pill bg-success">Tidak Aktif</span> 
                        <?php } ?>
                    </td>
                    <td>
                        <button class="btn badge badge-warning" data-toggle="modal" data-target="#editmenu<?= $data['id'] ?>Modal"><i class="fas fa-edit"></i> Ubah</button>
                        <button class="btn badge badge-danger" onclick="hapus_user_access_menu(<?= $data['id'] ?>)"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <?php $no++; endforeach;  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Nama Submenu</th>
                    <th>Menu</th>
                    <th>Url</th>
                    <th>Icon</th>
                    <th>Aktif?</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
      </div>
    </section>
    <!-- /.content -->

 </div>



