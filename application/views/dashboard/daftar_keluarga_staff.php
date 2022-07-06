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
                <h3 class="card-title">Detail Data Keluarga Semua Staff</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th> 
                    <th>Nama Pegawai</th> 
                    <th>No KK</th> 
                    <th>NIK</th>
                    <th>Nama Anggota</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Golongan Darah</th>
                    <th>Hubungan</th>
                    <th>Dokumen</th>
                  </tr>
                  </thead>
                <tbody>
                  <?php $no=1;foreach($list_keluarga as $lk) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $lk->Full_name ?></td>
                    <td><?= $lk->No_KK ?></td>
                    <td><?= $lk->NIK ?></td>
                    <td><?= $lk->Name ?></td>
                    <td><?= $lk->Phone ?></td>
                    <td><?= $lk->Email ?></td>
                    <td><?= $lk->Gender ?></td>
                    <td><?= $lk->Birth_date ?></td>
                    <td><?= $lk->Blood_type ?></td>
                    <td><?= $lk->Relationship ?></td>
                    <td><a href="<?= base_url('assets/dokumen_keluarga/'.$lk->Dokumen) ?>" target="_blank"><?= $lk->Dokumen ?></a></td>
                  </tr>
                  <?php $no++;endforeach; ?>
                </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th> 
                    <th>Nama Pegawai</th> 
                    <th>No KK</th> 
                    <th>NIK</th>
                    <th>Nama Anggota</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Golongan Darah</th>
                    <th>Hubungan</th>
                    <th>Dokumen</th>
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