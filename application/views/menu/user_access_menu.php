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
            <p><h4 class="text-secondary">Role: <?= $role['role'] ?></h4></p>
            <?= $this->session->flashdata('message') ?>
        </div>
        <a class="btn btn-primary" data-toggle="modal" data-target="#tambahmenuModal"><i class="fas fa-plus"></i> Tambah Menu</a>
      </div>
 </div>

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Access Menu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="user-menu">
                <table id="bloodType_table" class="table table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($menu as $data) : ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['menu'] ?></td>
                    <td>
                    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="checkbox_menu<?= $data['id'] ?>" <?= check_access($role['id'], $data['id']) ?> 
  data-role_id="<?= $role['id'] ?>" data-id_menu="<?= $data['id'] ?>" onclick="change_access(<?= $data['id'] ?>, <?= $role['id'] ?>)">
  <label class="form-check-label">
    
  </label>
</div>
                    </td>
                  </tr>
                  <?php $no++; endforeach;  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Action</th>
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



