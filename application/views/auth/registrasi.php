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
          <div class="col-6">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" aria-expanded="false">
      <i class="fa fa-plus"> </i> Tambah Akun Pegawai
    </button>
  </div>
</div>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Akun Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aktif?</th>
                    <th>Waktu Dibuat</th>
                    <th>Dibuat Oleh</th>
                  </tr>
                  </thead>
                <tbody>
                  <?php $no=1; foreach($list_akun_user as $lau): ?>
                  <tr>
                  <th><?= $no ?></th>
                    <td><?= $lau->Full_name ?></td>
                    <td><?= $lau->Email1 ?></td>
                    <td><?= $lau->role ?></td>
                    <td><?php if ($lau->is_active == 1) { ?>
                      <span class="badge bg-success">Aktif</span>
                      <?php }else{ ?>
                      <span class="badge bg-success">Tidak Aktif</span>
                      <?php } ?>
                    </td>
                    <td><?php $originalDate = $lau->waktu_dibuat;
                        $newDate = date("Y-m-d H:i:s", strtotime($originalDate));
                        echo $newDate; ?></td>
                    <td>Admin</td>
                  </tr>
                  <?php $no++; endforeach; ?>
                </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aktif?</th>
                    <th>Waktu Dibuat</th>
                    <th>Dibuat Oleh</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
           <!-- /.col-12 -->
        </div>
         <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Akun Pegawai</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="tambah_akun_baru">
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nama Staff</label>
  <select class="form-select" id="id_staff" name="id_staff" aria-label="Default select example">
  <option selected>Pilih Staff</option>
  <?php foreach($akun_user_inactive as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Full_name ?></option>
  <?php endforeach; ?>
</select> 
</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" class="form-control" id="password" name="password">
  </div>

  <div class="mb-3">
  <label for="gender" class="form-label">Akun Diaktifkan?<span class="required text-danger">*</span></label>
  <div class="form-inline">
  <div class="form-check mr-3">
  <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1">
  <label class="form-check-label">
  Sekarang
  </label>
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="is_active" id="is_active" value="0">
  <label class="form-check-label" for="jenis_kelamin">
    Nanti
  </label>
</div>
</div>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Level Pengguna</label>
  <select class="form-select" id="role_id" name="role_id" aria-label="Default select example">
  <option selected>Pilih Level</option>
  <?php foreach($user_role as $data) : ?>
  <option value="<?= $data->id ?>"><?= $data->role ?></option>
  <?php endforeach; ?>
</select> 
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