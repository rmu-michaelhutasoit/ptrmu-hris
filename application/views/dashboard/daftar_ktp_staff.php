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
                <h3 class="card-title">Detail Data KTP Semua Staff</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th> 
                    <th>Nama</th> 
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>RT RW</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Berlaku Sampai</th>
                    <th>Tanggal Dikeluarkan </th>
                    <th>Dokumen</th>
                  </tr>
                  </thead>
                <tbody>
                  <?php $no=1;foreach($list_ktp as $lk) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $lk->Full_name ?></td>
                    <td><?= $lk->Reg_no ?></td>
                    <td><?= $lk->Address ?></td>
                    <td><?= $lk->RT_RW ?></td>
                    <td><?= $lk->Kelurahan_desa ?></td>
                    <td><?= $lk->Kecamatan ?></td>
                    <td><?= $lk->Valid_to ?></td>
                    <td><?= $lk->Signed_date ?></td>
                    <td><a href="<?= base_url('assets/dokumen_ktp/'.$lk->Dokumen) ?>" target="_blank"><?= $lk->Dokumen ?></a></td>
                  </tr>
                  <?php $no++;endforeach; ?>
                </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th> 
                  <th>Nama</th> 
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>RT RW</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Berlaku Sampai</th>
                    <th>Tanggal Dikeluarkan </th>
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