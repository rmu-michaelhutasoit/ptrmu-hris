<!-- <div class="content-wrapper">
    <section class="administration_tool">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg">
            <div class="card mt-3">
  <h5 class="card-header">Administration Tool</h5>
  <div class="card-body ml-2">
      <nav class="nav nav-pills">
      <li class="nav-item">
           <a href="" class="btn btn-light nav-link" data-toggle="modal" data-target="#exampleModal1">
    <i class="fa fa-user-plus"></i>
    <p>Staff Baru</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="<?= base_url('daftar_staff') ?>" class="btn btn-light nav-link">
    <i class="fa fa-users"></i>
    <p>Semua Staff</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="<?= base_url('dashboard/daftar_kontrak_staff') ?>" class="btn btn-light nav-link">
    <i class="fa fa-folder-open"></i>
    <p>Kontrak</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal4">
      <i class="fa fa-folder-open"></i>
    <p>Presensi</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal5">
      <i class="fa fa-folder-open"></i>
    <p>Cuti</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal6">
      <i class="fa fa-folder-open"></i>
    <p>Kinerja</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal7">
      <i class="fa fa-folder-open"></i>
    <p>MCU</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal8">
      <i class="fa fa-folder-open"></i>
    <p>Psikotest</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal9">
      <i class="fa fa-folder-open"></i>
    <p>Buku Tamu</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal10">
      <i class="fa fa-folder-open"></i>
    <p>Surat</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="<?= base_url('dashboard/daftar_asuransi') ?>" class="btn btn-light nav-link">
 <i class="fa fa-folder-open"></i>
    <p>Asuransi</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal12">
 <i class="fa fa-folder-open"></i>
    <p>Pelatihan</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="<?= base_url('dashboard/daftar_bank') ?>" class="btn btn-light nav-link">
 <i class="fa fa-folder-open"></i>
    <p>Bank</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="<?= base_url('dashboard/daftar_ktp') ?>" class="btn btn-light nav-link">
 <i class="fa fa-folder-open"></i>
    <p>KTP</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="<?= base_url('dashboard/daftar_npwp') ?>" class="btn btn-light nav-link">
 <i class="fa fa-folder-open"></i>
    <p>NPWP</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal16">
 <i class="fa fa-folder-open"></i>
    <p>SIM</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="<?= base_url('dashboard/daftar_keluarga') ?>" class="btn btn-light nav-link">
 <i class="fa fa-folder-open"></i>
    <p>Keluarga</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal18">
 <i class="fa fa-folder-open"></i>
    <p>Kontak Darurat</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal19">
 <i class="fa fa-folder-open"></i>
    <p>Pendidikan</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal20">
 <i class="fa fa-folder-open"></i>
    <p>Inventaris</p>
    </a>
  </li>

  <li class="nav-item">
      <a href="#" class="btn btn-light nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal21">
 <i class="fa fa-folder-open"></i>
    <p>Biodata</p>
    </a>
  </li>
  
    </nav>
  </div>
</div>
            </div>
            </div>
        </div>
    </section>
</div>

<?php $no=1;
   while ($no <= 21) { ?>
<div class="modal fade" id="exampleModal<?= $no; ?>" tabindex="-1" aria-labelledby="exampleModal<?= $no; ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <?php if ($no === 1) { ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal<?= $no; ?>Label">Detail Staff</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">     
      <form enctype="multipart/form-data" id="staff_baru" novalidate="novalidate">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Foto Diri</label>
    <div class="form-group row">
      <div class="col sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar" id="gambar">
            <label class="custom-file-label" for="gambar">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">
            <img src="" class="img-thumbnail" id="image">
          </div>
        </div>
      </div>
  </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
  </div>

  <div class="form-group">
  <label for="exampleDataList" class="form-label">Lokasi Kantor</label>
<input class="form-control" list="datalistOptions" name="lokasi_kantor" id="lokasi_kantor" placeholder="Ketik Untuk Mencari/Klik Kolom Ini 2x untuk melihat daftar...">
<datalist id="datalistOptions">
    <?php foreach($basis_lokasi as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Office_location ?></option>
      <?php endforeach; ?>
</datalist>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">No Handphone</label>
    <input type="number" class="form-control" id="no_hp" name="no_hp">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Alamat</label>
    <textarea type="text" class="form-control" name="alamat" id="alamat" rows="4"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="1">
  <label class="form-check-label" for="flexRadioDefault1">
   Pria
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="2">
  <label class="form-check-label" for="flexRadioDefault2">
    Wanita
  </label>
</div>
  </div>

  <div class="form-group">
  <label for="exampleDataList" class="form-label">Pendidikan Terakhir</label>
  <select class="form-select" aria-label="Default select example" id="pendidikan_terakhir" name="pendidikan_terakhir">
  <?php foreach($pendidikan_terakhir as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Last_education ?></option>
  <?php endforeach; ?>
</select>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" id="tempat_lahir">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
  </div>

  <div class="form-group">
  <label for="exampleDataList" class="form-label">Pernikahan Terakhir</label>
  <select class="form-select" aria-label="Default select example" id="pernikahan_terakhir" name="pernikahan_terakhir">
  <?php foreach($pernikahan_terakhir as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Marital_status ?></option>
  <?php endforeach; ?>
</select>
  </div>

  <div class="form-group">
  <label class="form-label">Golongan Darah</label>
  <select class="form-select" aria-label="Default select example" id="golongan_darah" name="golongan_darah">
  <?php foreach($golongan_darah as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Blood_type ?></option>
  <?php endforeach; ?>
</select>
  </div>

  <div class="form-group">
  <label for="exampleDataList" class="form-label">Status Kontrak</label>
<input class="form-control" list="datalistKontrak" id="status_kontrak" name="status_kontrak" placeholder="Ketik Untuk Mencari/Klik Kolom Ini 2x untuk melihat daftar...">
<datalist id="datalistKontrak">
    <?php foreach($status_kontrak as $data) : ?>
  <option value="<?= $data->Status ?>">
      <?php endforeach; ?>
</datalist>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Catatan</label>
    <textarea type="text" class="form-control" id="catatan" name="catatan" rows="4"></textarea>
  </div>

  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn_add_staff">Save changes</button>
      </div>
</form>
      </div>
     
      <?php } ?>
    </div>
  </div>
</div>
<?php $no++;}  ?>


 -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3>150</h3>
<p>New Orders</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>53<sup style="font-size: 20px">%</sup></h3>
<p>Bounce Rate</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>44</h3>
<p>User Registrations</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>65</h3>
<p>Unique Visitors</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

          <div class="col-lg-12">
          <div class="card card-info">
          <div class="card-header">
                <h3 class="card-title">Line Chart</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool"  data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
        <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
              </div>
          </div>
          <div class="col-lg-6">
             <!-- DONUT CHART -->
             <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        <div class="col-lg-6">
               <!-- BAR CHART -->
               <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->    
          </div>
          <!-- /.col-6 -->
     
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>