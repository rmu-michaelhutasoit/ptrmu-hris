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
              <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
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
                <h3 class="card-title">Detail Data Asuransi Semua Staff</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Kategori Asuransi</th>
                    <th>No Registrasi</th>
                    <th>Tanggal Dikeluarkan</th>
                    <th>Aktif Sampai</th>
                    <th>Dokumen</th>
                  </tr>
                  </thead>
                <tbody>
                  <?php $no=1;foreach($list_asuransi as $la) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $la->Full_name ?></td>
                    <td><?= $la->Kategori_asuransi ?></td>
                    <td><?= $la->Reg_number ?></td>
                    <td><?= $la->Start_date ?></td>
                    <td><?= $la->Valid_to ?></td>
                    <td>
                        <?php if ($la->id_asuransi == 1) { ?>
                            <a href="<?= base_url('assets/dokumen_asuransi/asuransi_bpjs_kesehatan/'.$la->Dokumen_BPJS_Kesehatan) ?>" target="_blank"><?= $la->Dokumen_BPJS_Kesehatan ?></a>
                        <?php }else if($la->id_asuransi == 2){ ?>
                            <a href="<?= base_url('assets/dokumen_asuransi/asuransi_bpjs_ketenagakerjaan/'.$la->Dokumen_BPJS_Kesehatan) ?>" target="_blank"><?= $la->Dokumen_BPJS_Kesehatan ?></a>
                        <?php }else if($la->id_asuransi == 3){ ?>
                            <a href="<?= base_url('assets/dokumen_asuransi/manulife_rs/'.$la->Dokumen_BPJS_Kesehatan) ?>" target="_blank"><?= $la->Dokumen_BPJS_Kesehatan ?></a>
                        <?php }else{ ?>
                            <a href="<?= base_url('assets/dokumen_asuransi/manulife_jiwa/'.$la->Dokumen_BPJS_Kesehatan) ?>" target="_blank"><?= $la->Dokumen_BPJS_Kesehatan ?></a>
                        <?php } ?>
                    </td>
                  </tr>
                  <?php $no++;endforeach; ?>
                </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Kategori Asuransi</th>
                    <th>No Registrasi</th>
                    <th>Tanggal Dikeluarkan</th>
                    <th>Aktif Sampai</th>
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