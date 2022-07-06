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
        <button id="btnGroupDrop1" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_staffModal" aria-expanded="false">
      <i class="fa fa-plus"> </i> Tambah Staff Baru
    </button>
    </div>
    </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
       <!-- Default box -->
       <div class="card card-solid">
        <div class="card-body pb-0">
        <div class="row m-2">
                <div class="form-group">
                <label>Cari:</label>
                    <form action="">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Type your keywords here" id="search_staff">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                            </div>
          <div class="row" id="staff-profile" >
              <?php foreach ($info_staff as $data) : ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">              
              <div class="ribbon-wrapper">
                  <?php if ($data->StatusKaryawan == "Resign") { ?>
                      <div class="ribbon bg-danger">
                      Resign
                    </div>
                 <?php }else if($data->StatusKaryawan == "Indefinite"){ ?>
                    <div class="ribbon bg-success">
                      Indefinite
                    </div>
                    <?php }else if($data->StatusKaryawan == "Definite"){ ?>
                        <div class="ribbon bg-info">
                     Definite
                    </div>
                    <?php } ?>
                    </div>
              <div class="card-header text-muted border-bottom-0">
                 NIK: <?= $data->Employee_reg_number ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b> <?= $data->Full_name ?></b></h2>
                      <p class="text-muted text-sm"><b>Posisi: </b> <?= $data->Position ?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: <?= $data->Address; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Contact : <?= $data->Phone1 ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                        <?php if (!is_null($data->Photograph)) { ?>
                             <img src="<?= base_url('assets/staff_foto/'.$data->Photograph) ?>" alt="N/A" class="img-circle img-fluid">
                       <?php }else { ?>
                        <img src="<?= base_url('assets/staff_foto/no_photo.png') ?>" class="img-circle img-fluid">
                        <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="<?= base_url('Daftar_staff/data_tambahan/'.$data->Staff_ID) ?>" class="btn btn-sm bg-teal">
                    <i class="fa-solid fa-folder-magnifying-glass"></i> Data Tambahan
                    </a>
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailprofile<?= $data->Staff_ID ?>Modal">
                      <i class="fas fa-user"> </i> Detail
                    </a>
                  </div>
                </div>
              </div>
            </div>
            ok
            <?php endforeach; ?>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0" id="data-pagination">
             
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
</div>


<!-- Tambah Staff Baru -->
<div class="modal fade" id="tambah_staffModal" tabindex="-1" aria-labelledby="tambah_staffModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
       
      <div class="modal-header">
        <h5 class="modal-title" id="tambah_staffModalLabel">Detail Staff</h5>
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
    </div>
  </div>
</div>







<!-- Modal -->
<?php foreach($info_staff as $data) : ?>
<div class="modal fade" id="detailprofile<?= $data->Staff_ID ?>Modal" tabindex="-1" aria-labelledby="detailprofile<?= $data->Staff_ID ?>ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailprofile<?= $data->Staff_ID ?>ModalLabel">Edit Profile Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="edit_detail_data_staff<?= $data->Staff_ID ?>">
      <input type="hidden" value="<?= $data->Staff_ID ?>" name="id_staff">
      <div class="mb-3">
<label for="gambar" class="form-label">Foto Sekarang</span></label>
<div class="col-sm">
  <p><?= $data->Photograph ?></p>
    <img src="<?= base_url('assets/staff_foto/'.$data->Photograph) ?>" class="img-thumbnail">
    <input type="hidden" value="<?= $data->Photograph ?>" name="dokumen_lama">
  </div>
</div>

<div class="mb-3">
 <label for="gambar" class="form-label">Foto Baru</span></label>
 <div class="form-group row">
   <div class="col sm-10">
     <div class="row">
     <div class="col-sm-6">
       <div class="custom-file">
         <input type="file" class="custom-file-input" name="gambar_detail_staff" id="gambar_detail_staff<?= $data->Staff_ID ?>" onclick="viewEditImage_detail_staff(<?= $data->Staff_ID ?>)">
         <label class="custom-file-label" for="gambar_detail_staff"></label>
     </div>
       </div>
       <div class="col-sm-6">
       <img src="" class="img-thumbnail" id="image_detail_staff<?= $data->Staff_ID ?>">
       </div>
      </div>
   </div>
</div>
</div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $data->Full_name ?>">
  </div>

  <div class="form-group">
  <label for="exampleDataList" class="form-label">Lokasi Kantor</label>
<input class="form-control" list="datalistLokasiKantor" name="lokasi_kantor" id="lokasi_kantor" placeholder="Ketik Untuk Mencari/Klik Kolom Ini 2x untuk melihat daftar..." value="<?= $data->Office_location ?>">
<datalist id="datalistLokasiKantor">
    <?php foreach($basis_lokasi as $bl) : ?>
  <option value="<?= $bl->ID ?>"><?= $bl->Office_location ?>
      <?php endforeach; ?>
</datalist>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= $data->Email1 ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">No Handphone</label>
    <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $data->Phone1 ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Alamat</label>
    <textarea type="text" class="form-control" name="alamat" id="alamat" rows="4" value="<?= $data->Address ?>"><?= $data->Address ?></textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" <?= $data->Gender == "Male" ? 'checked' : '' ?>>
  <label class="form-check-label" for="flexRadioDefault1">
   Pria
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Wanita" <?= $data->Gender == "Female" ? 'checked' : ''?>>
  <label class="form-check-label" for="flexRadioDefault2">
    Wanita
  </label>
</div>
  </div>

  <div class="form-group">
  <label for="exampleDataList" class="form-label">Pendidikan Terakhir</label>
  <select class="form-select" aria-label="Default select example" name="pendidikan_terakhir" id="pendidikan_terakhir"> 
  <option selected>Open this select menu</option>
  <?php foreach($pendidikan_terakhir as $pt): ?>
  <option value="<?= $pt->ID ?>" <?= $pt->Last_education == $data->Last_education ? 'selected' : '' ?>><?= $pt->Last_education ?></option>
  <?php endforeach; ?>
</select>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" id="tempat_lahir" value="<?= $data->Birth_place ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php  if(isset($data->Birth_date)){ $originalDate = $data->Birth_date;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; }else{}?>">
  </div>

  <div class="form-group">
  <label for="exampleDataList" class="form-label">Pernikahan Terakhir</label>
  <select class="form-select" aria-label="Default select example" name="pernikahan_terakhir" id="pernikahan_terakhir"> 
  <option selected>Open this select menu</option>
  <?php foreach($pernikahan_terakhir as $pt): ?>
  <option value="<?= $pt->ID ?>" <?= $pt->Marital_status == $data->Marital_status ? 'selected' : '' ?>><?= $pt->Marital_status ?></option>
  <?php endforeach; ?>
</select>
  </div>

  <div class="form-group">
  <label for="exampleDataList" class="form-label">Golongan Darah</label>
  <select class="form-select" aria-label="Default select example" name="golongan_darah" id="golongan_darah"> 
  <option selected>Open this select menu</option>
  <?php foreach($golongan_darah as $gd): ?>
  <option value="<?= $gd->ID ?>" <?= $gd->Blood_type == $data->Blood_type ? 'selected' : '' ?>><?= $gd->Blood_type ?></option>
  <?php endforeach; ?>
</select>
  </div>

  <div class="form-group">
  <label for="exampleDataList" class="form-label">Status Kontrak</label>
  <select class="form-select" aria-label="Default select example" name="status" id="status"> 
  <option selected>Open this select menu</option>
  <?php foreach($status_kontrak as $sk): ?>
  <option value="<?= $sk->ID ?>" <?= $sk->Status == $data->STATUS ? 'selected' : '' ?>><?= $sk->Status ?></option>
  <?php endforeach; ?>
</select>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Catatan</label>
    <textarea type="text" class="form-control" id="catatan" name="catatan" rows="4"></textarea>
  </div>

  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" onclick="edit_detail_data_staff(<?= $data->Staff_ID ?>)">Ubah</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

