<!-- Content Wrapper. Contains page content -->
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
        <div class="col-md-8 d-flex justify-content-end p-3">
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Kontrak Semua Staff</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>No Registrasi Pegawai</th>
                    <th>Status</th>
                    <th>Bidang</th>
                    <th>Sub Bidang</th>
                    <th>Position</th>
                    <th>Level</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Tanggal Keluar</th>
                  </tr>
                  </thead>
                <tbody>
                  <?php $no=1;foreach($list_kontrak as $lk) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $lk->Full_name ?></td>
                    <td><?= $lk->Employee_reg_number ?></td>
                    <td><?= $lk->STATUS ?></td>
                    <td><?= $lk->Departement ?></td>
                    <td><?= $lk->Sub_departement ?></td>
                    <td><?= $lk->Position ?></td>
                    <td><?= $lk->LEVEL ?></td>
                    <td><?= $lk->Start_date ?></td>
                    <td><?= $lk->Finish_date ?></td>
                    <td><?= $lk->Resign_date ?></td>
                  </tr>
                  <?php $no++;endforeach; ?>
                </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Full Name</th>
                    <th>No Registrasi Pegawai</th>
                    <th>Status</th>
                    <th>Bidang</th>
                    <th>Sub Bidang</th>
                    <th>Position</th>
                    <th>Level</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Tanggal Keluar</th>
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
</div>