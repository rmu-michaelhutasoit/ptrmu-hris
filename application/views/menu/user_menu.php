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
                <h3 class="card-title">Daftar Golongan Darah</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="user-menu">
                <table id="bloodType_table" class="table table-bordered table-hover">
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
                        <button class="btn badge badge-warning" data-toggle="modal" data-target="#editmenu<?= $data['id'] ?>Modal"><i class="fas fa-edit"></i> Ubah</button>
                        <button class="btn badge badge-danger" onclick="hapus_menu(<?= $data['id'] ?>)"><i class="fas fa-trash"></i> Hapus</button>
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



 <!-- Modal -->
<div class="modal fade" id="tambahmenuModal" tabindex="-1" aria-labelledby="tambahmenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahmenuModalLabel">Tambah Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="tambah_menu">
    <div class="mb-3">
    <label for="menu" class="form-label">Nama Menu</label>
    <input type="text" class="form-control" id="menu" name="menu" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>




<!-- edit Menu Modal -->
<?php foreach ($menu as $data) : ?>
<div class="modal fade" id="editmenu<?= $data['id'] ?>Modal" tabindex="-1" aria-labelledby="editmenu<?= $data['id'] ?>ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmenu<?= $data['id'] ?>ModalLabel">Ubah Nama Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_menu<?= $data['id'] ?>">
        <input type="hidden" name="id_menu" value="<?= $data['id'] ?>">
    <div class="mb-3">
    <label for="menu" class="form-label">Nama Menu</label>
    <input type="text" class="form-control" id="menu" name="menu" aria-describedby="emailHelp" value="<?= $data['menu'] ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" onclick="edit_menu(<?= $data['id'] ?>)">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

