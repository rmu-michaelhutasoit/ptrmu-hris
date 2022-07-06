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
                <h3 class="card-title">User Role</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="user-submenu">
                <table id="bloodType_table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Role ID</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($user_role as $data) : ?>
                  <tr>
                    <td><?= $data->id ?></td>
                    <td><?= $data->role ?></td>
                    <td>
                        <a href="<?= base_url('Menu_manajemen/user_access_menu/'.$data->id) ?>" class="btn badge badge-info"><i class="fas fa-search"></i> User Access Menu</a>
                    </td>
                  </tr>
                  <?php $no++; endforeach;  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Role ID</th>
                    <th>Role</th>
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



