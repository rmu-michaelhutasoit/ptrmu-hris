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
        </div>
      </div>
 </div>

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Input Kehadiran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form id="input_kehadiran" enctype="multipart/form-data">
  <div class="form-group row">
    <input type="hidden" name="staff_id" id="staff_id" value="<?= $this->session->userdata('id_staff') ?>">
    <input type="hidden" name="status_kehadiran" id="status_kehadiran" value="1">
    <label for="tanggal_hadir" class="col-sm-2 col-form-label">Tanggal</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-plaintext" id="tanggal_hadir" name="tanggal_hadir" readonly value="<?= date('d-m-Y') ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="lokasi_hadir" class="col-sm-2 col-form-label">Lokasi Hadir</label>
    <div class="col-sm-6">
<input class="form-control" list="datalistLokasi" id="lokasi_hadir" name="lokasi_hadir" placeholder="Type to search...">
<datalist id="datalistLokasi">
    <?php foreach($lokasi_kantor as $lk): ?>
        <option value="<?= $lk->ID ?>"><?= $lk->Office_location ?>
    <?php endforeach; ?>
</datalist>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Catatan</label>
    <div class="col-sm-6">
      <textarea type="text" name="catatan" id="catatan" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group row">
  <div for="inputPassword" class="col-sm-2 col-form-label"></div>
    <div class="col-sm-6">
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
  </div>
</form>
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



