
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
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-plus"> </i> Tambah Data
    </button>
    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataAsuransi_Modal"><i class="fa fa-plus"></i> Data Asuransi</a></li>
      <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataBank_Modal"><i class="fa fa-plus"> </i> Data Bank</a></li>
      <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataKeluarga_Modal"><i class="fa fa-plus"> </i> Data Keluarga</a></li>
      <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataKTP_Modal"><i class="fa fa-plus"> </i> Data KTP</a></li>
      <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataKontrak_Modal"><i class="fa fa-plus"> </i> Data Kontrak</a></li>
      <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataNPWP_Modal"><i class="fa fa-plus"> </i> Data NPWP</a></li>
      <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataPenilaianKerja_Modal"><i class="fa fa-plus"> </i> Data Penilaian Kerja</a></li>
    </ul>
  </div>
</div>
        </div>
        <div class="col-md-8 d-flex justify-content-end p-3">
          <?php foreach($info_staff as $data) : ?>
          <span class="mr-2"><img src="<?= base_url('assets/staff_foto/'.$data->Photograph) ?>" class="img-circle" width="80px"></span>
          <span>
            <h4 class="text-bold"><?= $data->Full_name ?></h4>
            <p><?= $data->LEVEL."/".$data->Position ?></p>
          </span>
          <?php endforeach; ?>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <section class="content">
  <div class="container-fluid">
  <div class="col-md">
            <div class="card card-primary card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills justify-content-center">
                  <li class="nav-item"><a class="nav-link active" href="#pane-asuransi" data-toggle="tab">Asuransi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pane-bank" data-toggle="tab">Bank</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pane-keluarga" data-toggle="tab">Keluarga</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pane-ktp" data-toggle="tab">KTP</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pane-kontrak" data-toggle="tab">Kontrak</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pane-npwp" data-toggle="tab">NPWP</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pane-penilaian-kerja" data-toggle="tab">Penilaian Kerja</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content table-responsive" >
              <div class="active tab-pane" id="pane-asuransi">
              <table id="asuransi" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori Asuransi</th>
                    <th>Reg Number</th>
                    <th>Start date</th>
                    <th>Valid To</th>
                    <th>Dokumen</th>
                    <th>Update Terakhir</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($data_asuransi as $data) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data->Full_name ?></td>
                    <td><?= $data->Kategori_asuransi ?></td>
                    <td><?= $data->Reg_number ?></td>
                    <td><?php if(isset($data->Start_date))  {
                    $originalDate = $data->Start_date;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; }
                    else{echo "-";}
                     ?></td>
                    <td><?php if(isset($data->Valid_to))  {
                    echo $data->Valid_to; }
                    else{echo "-";}
                     ?></td>
                    <td>  
                    <?php if($data->Kategori_asuransi == "BPJS Kesehatan") { ?>
                      <a href="<?= base_url('assets/dokumen_asuransi/asuransi_bpjs_kesehatan/'.$data->Dokumen_BPJS_Kesehatan) ?>" target="_blank">
                      <?php }else if($data->Kategori_asuransi == "BPJS Ketenagakerjaan") { ?>
                        <a href="<?= base_url('assets/dokumen_asuransi/asuransi_bpjs_ketenagakerjaan/'.$data->Dokumen_BPJS_Kesehatan) ?>" target="_blank">
                      <?php }else if($data->Kategori_asuransi == "Manulife RS") { ?>
                        <a href="<?= base_url('assets/dokumen_asuransi/manulife_rs/'.$data->Dokumen_BPJS_Kesehatan) ?>" target="_blank">
                      <?php }else{ ?>
                        <a href="<?= base_url('assets/dokumen_asuransi/manulife_jiwa/'.$data->Dokumen_BPJS_Kesehatan) ?>" target="_blank">
                        <?php } ?>


                      <?php if(isset($data->Dokumen_BPJS_Kesehatan))  {
                             echo $data->Dokumen_BPJS_Kesehatan; }
                                  else{echo "-";}
                      ?></a></td>
                     <td><?= $data->Updated_date ?></td>
                    <td>
                    <button id="edit_asuransi" class="btn badge badge-success" data-toggle="modal" data-target="#editAsuransi<?= $data->ID ?>Modal"
                    ><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                    <button class="btn badge badge-danger" data-staff_id="<?= $this->uri->segment(3) ?>" onclick="hapus_data_asuransi(<?= $data->ID ?>)"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                    </td>
                  </tr>
                  <?php $no++; endforeach; ?> 
                  </tbody>
                  <tfoot>
                  <th>No</th>
                    <th>Nama</th>
                    <th>Kategori Asuransi</th>
                    <th>Reg Number</th>
                    <th>Start date</th>
                    <th>Valid To</th>
                    <th>Dokumen</th>
                    <th>Update Terakhir</th>
                    <th>Aksi</th>
                  </tfoot>
                </table>
              </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="pane-bank">
                  <table id="bank" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama Bank</th>
                    <th>Reg Number</th>
                    <th>Acc named</th>
                    <th>Acc No</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data_bank as $data) : ?>
                  <tr class="data-bank">
                    <td><?= $data->Full_name ?></td>
                    <td><?= $data->Bank_name ?></td>
                    <td><?= $data->Acc_named ?></td>                    
                    <td><?= $data->Acc_no ?></td>
                    <td><a href="<?= base_url('assets/dokumen_bank/'.$data->Dokumen) ?>" target="_blank"><?= $data->Dokumen ?></a></td>
                    <td>
                    <button class="btn badge badge-success" data-toggle="modal" data-target="#editBankModal"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                    <button class="btn badge badge-danger" onclick="hapus_data_bank(<?= $data->ID  ?>)"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <th>Nama Bank</th>
                    <th>Reg Number</th>
                    <th>Acc named</th>
                    <th>Acc No</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tfoot>
                </table>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <div class="tab-pane" id="pane-keluarga">
                  <table id="keluarga" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No KK</th>
                    <th>NIK</th>
                    <th>Nama Keluarga</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Golongan Darah</th>
                    <th>Hubungan</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($keluarga as $data) : ?>
                  <tr>
                    <td><?php if(isset($data->No_KK))  {
                    echo $data->No_KK; }
                    else{echo "-";}
                     ?></td>
                    <td><?php if(isset($data->NIK))  {
                    echo $data->NIK; }
                    else{echo "-";}
                     ?></td>
                    <td><?= $data->Name ?></td>
                    <td><?php if(isset($data->Phone))  {
                    echo $data->Phone; }
                    else{echo "-";}
                     ?></td>
                    <td><?php if(isset($data->Email))  {
                    echo $data->Email; }
                    else{echo "-";}
                     ?></td>
                    <td><?= $data->Gender ?></td>
                    <td><?= $data->Birth_date ?></td>
                    <td><?php if(isset($data->Blood_type))  {
                    echo $data->Blood_type; }
                    else{echo "-";}
                     ?></td>
                    <td><?= $data->Relationship ?></td>
                    <td><?php if(isset($data->Dokumen))  { ?>
                      <a href="<?= base_url('assets/dokumen_keluarga/'.$data->Dokumen) ?>" target="_blank"><?= $data->Dokumen ?></a>
                    <?php } else{echo "-";} ?></td>
                      <td>
                    <button class="btn badge badge-success" data-toggle="modal" data-target="#editKeluarga<?= $data->ID ?>Modal"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                    <button class="btn badge badge-danger" onclick="hapus_data_keluarga(<?= $data->ID ?>)"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No KK</th>
                    <th>NIK</th>
                    <th>Nama Keluarga</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Golongan Darah</th>
                    <th>Hubungan</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
                  </div>

                  <div class="tab-pane" id="pane-ktp">
                  <table id="ktp" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Reg No</th>
                    <th>Alamat</th>
                    <th>RT/RW</th>
                    <th>Kelurahan Desa</th>
                    <th>Kecamatan</th>
                    <th>Valid To</th>
                    <th>Signed Date</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ktp as $data) : ?>
                  <tr>
                    <td><?= $data->Reg_no ?></td>
                    <td><?= $data->Address ?></td>
                    <td><?= $data->RT_RW ?></td>
                    <td><?= $data->Kelurahan_desa ?></td>
                    <td><?= $data->Kecamatan ?></td>
                    <td><?= $data->Valid_to ?></td>
                    <td><?= $data->Signed_date ?></td>
                    <td><a href="<?= base_url('assets/dokumen_ktp/'.$data->Dokumen) ?>" target="_blank"><?= $data->Dokumen ?></a></td>
                    <td>
                    <a class="btn badge badge-success" data-toggle="modal" data-target="#editKTPModal"><i class="fa-solid fa-pen-to-square"></i> Ubah</a>
                    <a class="btn badge badge-danger" onclick="hapus_data_ktp(<?= $data->ID ?>)"><i class="fa-solid fa-trash-can"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>  
                    <th>Reg No</th>
                    <th>Alamat</th>
                    <th>RT/RW</th>
                    <th>Kelurahan Desa</th>
                    <th>Kecamatan</th>
                    <th>Valid To</th>
                    <th>Signed Date</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
                  </div>

                  <div class="tab-pane" id="pane-kontrak">
                  <table id="kontrak" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No Registrasi</th>
                    <th>Status</th>
                    <th>Bidang</th>
                    <th>Sub Bidang</th>
                    <th>Position</th>
                    <th>Level</th>
                    <th>Lokasi Kantor</th>
                    <th>Mulai Bekerja</th>
                    <th>Selesai Kontrak</th>
                    <th>Tanggal Berhenti</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($kontrak as $data): ?>
                  <tr>
                    <td><?= $data->Employee_reg_number  ?></td>
                    <td><?= $data->STATUS ?></td>
                    <td><?= $data->Departement?></td>
                    <td><?= $data->Sub_departement?></td>
                    <td><?= $data->Position?></td>
                    <td><?= $data->LEVEL ?></td>
                    <td><?= $data->Office_location ?></td>
                    <td><?= $data->Start_date?></td>
                    <td><?= $data->Finish_date?></td>
                    <td><?= $data->Resign_date?></td>
                    <td> <a href="<?= base_url('assets/dokumen_kontrak/'.$data->Dokumen) ?>" target="_blank"><?= $data->Dokumen ?></a></td>
                    <td>
                    <a class="btn badge badge-success" data-toggle="modal" data-target="#editKontrak<?= $data->IDContract ?>Modal"><i class="fa-solid fa-pen-to-square"></i>Ubah</a>
                    <a class="btn badge badge-danger" onclick="hapus_data_kontrak(<?= $data->IDContract ?>)"><i class="fa-solid fa-trash-can"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No NPWP</th>
                    <th>Status</th>
                    <th>Bidang</th>
                    <th>Sub Bidang</th>
                    <th>Position</th>
                    <th>Level</th>
                    <th>Lokasi Kantor</th>
                    <th>Mulai Bekerja</th>
                    <th>Selesai Kontrak</th>
                    <th>Tanggal Berhenti</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
                  </div>

                  <div class="tab-pane" id="pane-npwp">
                  <table id="npwp" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>No NPWP</th>
                    <th>Tanggal Terdaftar</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($npwp as $data) : ?>
                  <tr>
                    <td><?= $data->No_NPWP ?></td>
                    <td><?= $data->Tanggal_terdaftar ?></td>
                    <td><?= $data->Dokumen ?></td>
                    <td>
                    <a class="btn badge badge-success" data-toggle="modal" data-target="#editNPWPModal"><i class="fa-solid fa-pen-to-square"></i>Ubah</a>
                    <a class="btn badge badge-danger" onclick="hapus_data_npwp(<?= $data->ID ?>)"><i class="fa-solid fa-trash-can"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No NPWP</th>
                    <th>Tanggal Terdaftar</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
                  </div>

                  <div class="tab-pane" id="pane-penilaian-kerja">
                  <table id="penilaian-kerja" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kategori Penilaian</th>
                    <th>Tanggal Penilaian</th>
                    <th>Kontrak</th>
                    <th>Skor Penilaian Kerja</th>
                    <th>Rekomendasi Atasan</th>
                    <th>Lampiran</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($penilaian_kerja as $data) : ?>
                  <tr>
                    <td><?= $data->Kategori_penilaian ?></td>
                    <td><?= $data->Tanggal ?></td>
                    <td><?= $data->Start_date. " Sampai " .$data->Finish_date  ?></td>
                    <td><?= $data->Poin. ", " .$data->Konversi. ", " .$data->Keterangan ?></td>
                    <td><?= $data->Rekomendasi_atasan ?></td>
                    <td><?= $data->Lampiran ?></td>
                    <td>
                    <a class="btn badge badge-success" data-toggle="modal" data-target="#editPenilaianKerja<?= $data->ID ?>Modal"><i class="fa-solid fa-pen-to-square"></i>Ubah</a>
                    <a class="btn badge badge-danger" onclick="hapus_data_penilaian_kerja(<?= $data->ID ?>)"><i class="fa-solid fa-trash-can"></i> Hapus</a>
                    </td>
                    <?php endforeach; ?>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Kategori Penilaian</th>
                    <th>Tanggal Penilaian</th>
                    <th>Kontrak</th>
                    <th>Skor Penilaian Kerja</th>
                    <th>Rekomendasi Atasan</th>
                    <th>Lampiran</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>  
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
  </div>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






  <!-- Asuransi Modal -->
<div class="modal fade" id="dataAsuransi_Modal" tabindex="-1" aria-labelledby="dataAsuransi_ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataAsuransi_ModalLabel">Tambah Data Asuransi</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="tambah_data_asuransi">
     
        <input type="hidden" value="<?= $this->uri->segment(3) ?>" id="staff_id" name="staff_id">
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Kategori Asuransi<span class="required text-danger">*</span></label>
  <select class="form-select" aria-label="Default select example" id="kategori_asuransi" name="kategori_asuransi" required>
    <option selected>Pilih Kategori</option>
    <?php foreach($kategori_asuransi as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Kategori_asuransi ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
  <label for="nomor_registrasi" class="form-label">Nomor Registrasi<span class="required text-danger">*</span></label>
  <input type="text" class="form-control" id="nomor_registrasi" name="nomor_registrasi">
</div>

<div class="row mb-3">
<div class="col-6">
  <label for="tanggal_mulai" class="form-label">Tanggal Mulai<span class="required text-danger">*</span></label>
  <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
</div>
<div class="col-6">
  <label for="tanggal_kadaluwarsa" class="form-label">Valid Sampai<span class="required text-danger">*</span></label>
  <input type="date" class="form-control" id="tanggal_kadaluwarsa" name="tanggal_kadaluwarsa">
</div>
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Dokumen Asuransi<span class="required text-danger">*</span></label>
    <div class="form-group row">
      <div class="col-sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="dokumen_asuransi" id="dokumen_asuransi">
            <label class="custom-file-label" for="dokumen_asuransi">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">
            <img src="" class="img-thumbnail" id="image_dokumen_asuransi">
          </div>
        </div>
      </div>
  </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>







  <!-- Bank Modal -->
  <div class="modal fade" id="dataBank_Modal" tabindex="-1" aria-labelledby="dataBank_ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataBank_ModalLabel">Tambah Data Bank</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="tambah_data_bank">
        <input type="hidden" name="staff_id" id="staff_id" value="<?= $this->uri->segment(3) ?>">
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Bank<span class="required text-danger">*</span></label>
  <input type="text" class="form-control" id="nama_bank" name="bank" value="Mandiri" readonly>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Atas Nama<span class="required text-danger">*</span></label>
  <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nomor Rekening<span class="required text-danger">*</span></label>
  <input type="number" class="form-control" id="nomor_rekening" name="nomor_rekening">
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Dokumen Lainnya<span class="required text-danger">*</span></label>
    <div class="form-group row">
      <div class="col sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="dokumen_bank" id="dokumen_bank">
            <label class="custom-file-label" for="dokumen_bank">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">
            <img src="" class="img-thumbnail" id="image_dokumen_bank">
          </div>
        </div>
      </div>
  </div>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>







  <!-- Keluarga Modal -->
  <div class="modal fade" id="dataKeluarga_Modal" tabindex="-1" aria-labelledby="dataKeluarga_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataKeluarga_ModalLabel">Tambah Data Keluarga</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form enctype="multipart/form-data" id="tambah_data_keluarga">
  <input type="hidden" id="staff_id" name="staff_id" value="<?= $this->uri->segment(3) ?>">
      <div class="mb-3">
  <label for="no_kk" class="form-label">No Kartu Keluarga<span class="required text-danger">*</span></label>
  <input type="number" class="form-control" id="no_kk" name="no_kk">
</div>

<div class="mb-3">
  <label for="nik" class="form-label">NIK<span class="required text-danger">*</span></label>
  <input type="number" class="form-control" id="nik" name="nik">
</div>

<div class="mb-3">
  <label for="nama" class="form-label">Nama<span class="required text-danger">*</span></label>
  <input type="text" class="form-control" id="nama" name="nama">
</div>

<div class="mb-3">
  <label for="no_hp" class="form-label">No Hp<span class="required text-danger">*</span></label>
  <input type="number" class="form-control" id="no_hp" name="no_hp">
</div>

<div class="mb-3">
  <label for="no_hp" class="form-label">Email<span class="required text-danger">*</span></label>
  <input type="text" class="form-control" id="email" name="email">
</div>

<div class="mb-3">
  <label for="gender" class="form-label">Gender<span class="required text-danger">*</span></label>
  <?php foreach($jenis_kelamin as $data) : ?>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value=<?= $data->ID ?>>
  <label class="form-check-label">
   <?= $data->Gender ?>
  </label>
</div>
<?php endforeach; ?>
<!-- <div class="form-check">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin">
  <label class="form-check-label" for="jenis_kelamin">
    Wanita
  </label>
</div> -->
</div>

<div class="mb-3">
  <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span class="required text-danger">*</span></label>
  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
</div>

<div class="mb-3">
  <label for="golongan_darah" class="form-label">Golongan Darah<span class="required text-danger">*</span></label>
  <select class="form-select" name="golongan_darah" id="golongan_darah" aria-label="Default select golongan_darah">
  <option selected>Pilih Golongan Darah</option>
  <?php foreach ($golongan_darah as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Blood_type   ?></option>
    <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
  <label for="golongan_darah" class="form-label">Hubungan<span class="required text-danger">*</span></label>
  <select class="form-select" name="hubungan" id="hubungan" aria-label="Default select hubungan">
    <option selected>Pilih Hubungan</option>
    <?php foreach($hubungan as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Relationship ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Dokumen<span class="required text-danger">*</span></label>
    <div class="form-group row">
      <div class="col sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="dokumen_kk" id="dokumen_kk">
            <label class="custom-file-label" for="dokumen_kk">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">
            <img src="" class="img-thumbnail" id="image_dokumen_kk">
          </div>
        </div>
      </div>
  </div>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>









  <!-- KTP Modal -->
  <div class="modal fade" id="dataKTP_Modal" tabindex="-1" aria-labelledby="dataKTP_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataKTP_ModalLabel">Tambah Data KTP</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form enctype="multipart/form-data" id="tambah_data_ktp">
  <input type="hidden" name="staff_id" id="staff_id" value="<?= $this->uri->segment(3) ?>">
      <div class="mb-3">
  <label for="no_registrasi" class="form-label">No Registrasi<span class="required text-danger">*</span></label>
  <input type="number" class="form-control" id="no_registrasi" name="no_registrasi">
</div>

<div class="mb-3">
  <label for="no_registrasi" class="form-label">Alamat<span class="required text-danger">*</span></label>
  <input type="text" class="form-control" id="alamat" name="alamat">
</div>

<div class="mb-3">
  <label for="rt_rw" class="form-label">RT/RW<span class="required text-danger">*</span></label>
  <input type="text" class="form-control" id="rt_rw" name="rt_rw">
</div>

<div class="mb-3">
  <label for="kelurahan_desa" class="form-label">Kelurahan Desa<span class="required text-danger">*</span></label>
  <input type="text" class="form-control" id="kelurahan_desa" name="kelurahan_desa">
</div>

<div class="mb-3">
  <label for="kecamatan" class="form-label">Kecamatan<span class="required text-danger">*</span></label>
  <input type="text" class="form-control" id="kecamatan" name="kecamatan">
</div>

<div class="mb-3">
  <label for="kadaluwarsa" class="form-label">Berlaku Sampai<span class="required text-danger">*</span></label>
  <input type="date" class="form-control" id="kadaluwarsa" name="kadaluwarsa">
</div>

<div class="mb-3">
  <label for="kadaluwarsa" class="form-label">Tanggal Dibuat<span class="required text-danger">*</span></label>
  <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat">
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Dokumen<span class="required text-danger">*</span></label>
    <div class="form-group row">
      <div class="col sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="dokumen_ktp" id="dokumen_ktp">
            <label class="custom-file-label" for="dokumen_ktp">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">
            <img src="" class="img-thumbnail" id="image_dokumen_ktp">
          </div>
        </div>
      </div>
  </div>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>







<!-- Kontrak Modal -->
<div class="modal fade" id="dataKontrak_Modal" tabindex="-1" aria-labelledby="dataKontrak_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataKontrak_ModalLabel">Tambah Data Kontrak</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form enctype="multipart/form-data" id="tambah_data_kontrak">
  <input type="hidden" id="staff_id" name="staff_id" value="<?= $this->uri->segment(3) ?>">
      <div class="mb-3">
  <label for="no_reg_pegawai" class="form-label">No Registrasi Pegawai<span class="required text-danger">*</span></label>
  <input type="number" class="form-control" id="no_reg_pegawai" name="no_reg_pegawai">
</div>

<div class="mb-3">
  <label for="status" class="form-label">Status<span class="required text-danger">*</span></label>
  <select class="form-select" name="status" id="status" aria-label="Default select example">
  <option selected>Status</option>
  <?php foreach($status_kontrak as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Status ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
  <label for="bidang" class="form-label">Bidang<span class="required text-danger">*</span></label>
  <select class="form-select" id="bidang" name="bidang" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <?php foreach($department as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Departement ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
  <label for="sub_bidang" class="form-label">Sub Bidang<span class="required text-danger">*</span></label>
  <select class="form-select" id="sub_bidang" name="sub_bidang" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <?php foreach($department_sub as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Sub_departement ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
  <label for="position" class="form-label">Position<span class="required text-danger">*</span></label>
  <select class="form-select" id="position" name="position" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <?php foreach($position as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Position ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
  <label for="level" class="form-label">Level<span class="required text-danger">*</span></label>
  <select class="form-select" id="level" name="level" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <?php foreach($level as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Level ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
  <label for="domisili" class="form-label">Domisili<span class="required text-danger">*</span></label>
  <textarea class="form-control" rows="3" id="domisili" name="domisili"></textarea>
</div>

<div class="mb-3">
  <label for="lokasi_kantor" class="form-label">Lokasi Kantor<span class="required text-danger">*</span></label>
  <select class="form-select" id="lokasi_kantor" name="lokasi_kantor" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <?php foreach($lokasi_kantor as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Office_location ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="row mb-3">
  <div class="col-6">
  <label for="mulai_kontrak" class="form-label">Mulai Kontrak<span class="required text-danger">*</span></label>
  <input type="date" class="form-control" id="mulai_kontrak" name="mulai_kontrak">
  </div>
  <div class="col-6">
  <label for="selesai_kontrak" class="form-label">Selesai Kontrak<span class="required text-danger">*</span></label>
  <input type="date" class="form-control" id="selesai_kontrak" name="selesai_kontrak">
  </div>
</div>

<div class="mb-3">
  <label for="resign" class="form-label">Tanggal Resign<span class="required text-danger">*</span></label>
  <input type="date" class="form-control" id="tanggal_resign" name="tanggal_resign">
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Dokumen<span class="required text-danger">*</span></label>
    <div class="form-group row">
      <div class="col sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="dokumen_kontrak" id="dokumen_kontrak">
            <label class="custom-file-label" for="dokumen_kontrak">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">
            <img src="" class="img-thumbnail" id="image_dokumen_kontrak">
          </div>
        </div>
      </div>
  </div>
  </div>

  <div class="mb-3">
  <label for="catatan" class="form-label">Catatan</label>
  <textarea class="form-control" rows="3" id="catatan" name="catatan"></textarea>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>




<!--  NPWP Modal -->
<div class="modal fade" id="dataNPWP_Modal" tabindex="-1" aria-labelledby="dataNPWP_ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataNPWP_ModalLabel">Tambah Data NPWP</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form enctype="multipart/form-data" id="tambah_data_npwp">
 <input type="hidden" id="staff_id" name="staff_id" value="<?= $this->uri->segment(3) ?>">
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">No NPWP<span class="required text-danger">*</span></label>
  <input type="number" class="form-control" id="no_npwp" name="no_npwp">
</div>

<div class="mb-3">
  <label for="tanggal_terdaftar" class="form-label">Tanggal Terdaftar<span class="required text-danger">*</span></label>
  <input type="date" class="form-control" id="tanggal_terdaftar" name="tanggal_terdaftar"></inp>
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Dokumen<span class="required text-danger">*</span></label>
    <div class="form-group row">
      <div class="col sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="dokumen_npwp" id="dokumen_npwp">
            <label class="custom-file-label" for="dokumen_npwp">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">
            <img src="" class="img-thumbnail" id="image_dokumen_npwp">
          </div>
        </div>
      </div>
  </div>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="dataPenilaianKerja_Modal" tabindex="-1" aria-labelledby="dataPenilaianKerja_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataPenilaianKerja_ModalLabel">Tambah Data Penilaian Kerja</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="tambah_data_penilaian_kerja">
        <input type="hidden" name="staff_id" id="staff_id" value="<?= $this->uri->segment(3) ?>">
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Kategori Penilaian</label>
  <select class="form-select" id="kategori_penilaian" name="kategori_penilaian" aria-label="Default select example">
  <option selected>Pilih Kategori Penilaian</option>
  <?php foreach($kategori_penilaian as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Kategori_penilaian ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Tanggal Penilaian</label>
  <input class="form-control" id="tanggal_penilaian" name="tanggal_penilaian" value="<?= date('Y-m-d') ?>" readonly>
</div>


<div class="mb-3">
  <label for="kontrak" class="form-label">Kontrak</label>
  <?php foreach($data_kontrak_terakhir as $data) : ?>
    <input type="hidden" id="id_kontrak" name="id_kontrak" value="<?= $data->id_kontrak ?>">
  <input class="form-control" id="lama_kontrak" name="lama_kontrak" value="<?= $data->Start_date." Sampai ".$data->Finish_date ?>" readonly>
  <?php endforeach; ?>
</div>

<div class="mb-3">
  <label for="skor_penilaian_kerja" class="form-label">Skor Penilaian Kerja</label>
  <select class="form-select" id="skor_penilaian" name="skor_penilaian">
  <option selected>Pilih Skor Penilaian Kerja</option>
  <?php foreach($skor_penilaian as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Poin.", ".$data->Konversi,", ".$data->Keterangan ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
  <label for="rekomendasi_atasan" class="form-label">Rekomendasi Atasan</label>
  <textarea class="form-control" id="rekomendasi_atasan" name="rekomendasi_atasan" rows="3"></textarea>
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Dokumen</label>
    <div class="form-group row">
      <div class="col sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="dokumen_penilaian_kerja" id="dokumen_penilaian_kerja">
            <label class="custom-file-label" for="dokumen_penilaian_kerja">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">  
            <img src="" class="img-thumbnail" id="image_dokumen_penilaian_kerja">
          </div>
        </div>
      </div>
  </div>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>




<!-- --------------------------------------------------------------------------------- -->




<!-- Modal Edit Asuransi -->
<?php $no=1; foreach ($data_asuransi as $data) : ?>
<div class="modal fade" id="editAsuransi<?= $data->ID ?>Modal" tabindex="-1" aria-labelledby="editAsuransi<?= $data->ID ?>ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAsuransi<?= $data->ID ?>ModalLabel">Edit Data Asuransi</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="edit_data_asuransi<?=$data->ID ?>">
     <input type="hidden" name="id_asuransi" value="<?= $data->ID ?>">
     <input type="hidden" value="<?= $this->uri->segment(3) ?>" id="staff_id" name="staff_id">
<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Kategori Asuransi<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="kategori_asuransi" name="kategori_asuransi" readonly value="<?= $data->Kategori_asuransi ?>">
</div>

<div class="mb-3">
<label for="nomor_registrasi" class="form-label">Nomor Registrasi<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="nomor_registrasi" name="nomor_registrasi" value="<?= $data->Reg_number ?>">
</div>

<div class="row mb-3">
<div class="col-6">
<label for="tanggal_mulai" class="form-label">Tanggal Mulai<span class="required text-danger">*</span></label>
<input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?php if(isset($data->Start_date)){ $originalDate = $data->Start_date;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; }else{} ?>">
</div>
<div class="col-6">
<label for="tanggal_kadaluwarsa" class="form-label">Valid Sampai<span class="required text-danger">*</span></label>
<input type="date" class="form-control" id="tanggal_kadaluwarsa" name="tanggal_kadaluwarsa" value="<?php if(isset($data->Valid_to)){ $originalDate = $data->Valid_to;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; }else{} ?>">
</div>
</div>

<div class="mb-3">
<label for="gambar" class="form-label">Dokumen Lama</span></label>
<div class="col-sm">
        <?php if($data->Kategori_asuransi == "BPJS Kesehatan") { ?>
          <p><?= $data->Dokumen_BPJS_Kesehatan?></p>
         <img src="<?= base_url('assets/dokumen_asuransi/asuransi_bpjs_kesehatan/'.$data->Dokumen_BPJS_Kesehatan) ?>" class="img-thumbnail">
         <input type="hidden" value="<?= $data->Dokumen_BPJS_Kesehatan ?>" name="dokumen_lama">
         <?php }else if($data->Kategori_asuransi == "BPJS Ketenagakerjaan") { ?>
          <p><?= $data->Dokumen_BPJS_Kesehatan?></p>
          <img src="<?= base_url('assets/dokumen_asuransi/asuransi_bpjs_ketenagakerjaan/'.$data->Dokumen_BPJS_Kesehatan) ?>" class="img-thumbnail">
          <input type="hidden" value="<?= $data->Dokumen_BPJS_Kesehatan ?>" name="dokumen_lama">
          <?php }else if($data->Kategori_asuransi == "Manulife RS") { ?>
            <p><?= $data->Dokumen_BPJS_Kesehatan?></p>
            <img src="<?= base_url('assets/dokumen_asuransi/manulife_rs/'.$data->Dokumen_BPJS_Kesehatan) ?>" class="img-thumbnail">
            <input type="hidden" value="<?= $data->Dokumen_BPJS_Kesehatan ?>" name="dokumen_lama">
        <?php }else { ?>
          <p><?= $data->Dokumen_BPJS_Kesehatan?></p>
          <img src="<?= base_url('assets/dokumen_asuransi/manulife_jiwa/'.$data->Dokumen_BPJS_Kesehatan) ?>" class="img-thumbnail">
          <input type="hidden" value="<?= $data->Dokumen_BPJS_Kesehatan ?>" name="dokumen_lama">
        <?php } ?>
        </div>
</div>

<div class="mb-3">
 <label for="gambar" class="form-label">Dokumen Baru</span></label>
 <div class="form-group row">
   <div class="col sm-10">
     <div class="row">
     <div class="col-sm-6">
       <div class="custom-file">
         <input type="file" class="custom-file-input" name="asuransi_dokumen" id="asuransi_dokumen<?= $data->ID ?>" onclick="viewEditImage(<?= $data->ID ?>)" >
         <label class="custom-file-label" for="asuransi_dokumen"></label>
     </div>
       </div>
       <div class="col-sm-6">
       <img src="" class="img-thumbnail" id="image_asuransi_dokumen<?= $data->ID ?>">
       </div>
      </div>
   </div>
</div>
</div>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
     <button type="submit" class="btn btn-primary" onclick="edit_data_asuransi(<?= $data->ID ?>)">Ubah</button>
   </div>
   </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>



<!-- Modal Edit Bank -->

<?php $no=1; foreach ($data_bank as $data) : ?>
<div class="modal fade" id="editBankModal" tabindex="-1" aria-labelledby="editBankModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBankModalLabel">Edit Data Bank</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="edit_data_bank">
     <input type="hidden" name="id_bank" value="<?= $data->ID ?>">
     <input type="hidden" value="<?= $this->uri->segment(3) ?>" id="staff_id" name="staff_id">

     <div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Nama Bank<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="nama_bank" name="nama_bank" readonly value="<?= $data->Bank_name ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Nama Pemilik<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?= $data->Acc_named ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Nomor Rekening<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" value="<?= $data->Acc_no ?>">
</div>

<div class="mb-3">
<label for="gambar" class="form-label">Dokumen Lama</span></label>
<div class="col-sm">
  <p><?= $data->Dokumen ?></p>
    <img src="<?= base_url('assets/dokumen_bank/'.$data->Dokumen) ?>" class="img-thumbnail">
    <input type="hidden" value="<?= $data->Dokumen ?>" name="dokumen_lama">
  </div>
</div>

<div class="mb-3">
 <label for="gambar" class="form-label">Dokumen Baru</span></label>
 <div class="form-group row">
   <div class="col sm-10">
     <div class="row">
     <div class="col-sm-6">
       <div class="custom-file">
         <input type="file" class="custom-file-input" name="bank_dokumen" id="bank_dokumen">
         <label class="custom-file-label" for="bank_dokumen"></label>
     </div>
       </div>
       <div class="col-sm-6">
       <img src="" class="img-thumbnail" id="image_bank_dokumen">
       </div>
      </div>
   </div>
</div>
</div>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
     <button type="submit" class="btn btn-primary">Ubah</button>
   </div>
   </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>



<!-- Edit Data Keluarga -->
<?php foreach ($keluarga as $cek) : ?>
<div class="modal fade" id="editKeluarga<?= $cek->ID ?>Modal" tabindex="-1" aria-labelledby="editKeluarga<?= $cek->ID ?>ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKeluarga<?= $cek->ID ?>ModalLabel">Edit Data Keluarga</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="edit_data_keluarga<?=$cek->ID ?>">
     <input type="hidden" name="id_keluarga" value="<?= $cek->ID ?>">
     <input type="hidden" value="<?= $this->uri->segment(3) ?>" id="staff_id" name="staff_id">

     <div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">NIK<span class="required text-danger">*</span></label>
<input type="number" class="form-control" id="nik" name="nik" value="<?= $cek->NIK ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Nama<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="nama" name="nama" value="<?= $cek->Name ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">No Hp<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $cek->Phone ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Email<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="email" name="email" value="<?= $cek->Email ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Jenis Kelamin<span class="required text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
  <option selected>Open this select menu</option>
  <?php foreach($jenis_kelamin as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Gender ?></option>
  <?php endforeach; ?>
</select>
</div>  

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Tanggal Lahir<span class="required text-danger">*</span></label>
<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php $originalDate = $cek->Birth_date;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Golongan Darah<span class="required text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="golongan_darah" id="golongan_darah">
  <?php foreach($golongan_darah as $row) : ?>
  <option value="<?= $row->ID ?>" <?= $row->Blood_type == $cek->Blood_type ? 'selected' : '' ?>><?=  $row->Blood_type ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Hubungan<span class="required text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="hubungan"  id="hubungan">
  <option selected>Open this select menu</option>
  <?php foreach($hubungan as $data) : ?>
  <option value="<?= $data->ID ?>"><?= $data->Relationship ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
<label for="gambar" class="form-label">Dokumen Lama</span></label>
<div class="col-sm">
  <p></p>
    <img src="<?= base_url('assets/dokumen_keluarga/'.$cek->Dokumen) ?>" class="img-thumbnail">
    <input type="hidden" value="<?= $cek->Dokumen ?>" name="dokumen_lama">
  </div>
</div>

<div class="mb-3">
 <label for="gambar" class="form-label">Dokumen Baru</span></label>
 <div class="form-group row">
   <div class="col sm-10">
     <div class="row">
     <div class="col-sm-6">
       <div class="custom-file">
         <input type="file" class="custom-file-input" name="keluarga_dokumen" id="keluarga_dokumen<?= $cek->ID ?>" onclick="viewEditImage_Keluarga(<?= $cek->ID ?>)">
         <label class="custom-file-label" for="keluarga_dokumen"></label>
     </div>
       </div>
       <div class="col-sm-6">
       <img src="" class="img-thumbnail" id="image_keluarga_dokumen<?= $cek->ID ?>">
       </div>
      </div>
   </div>
</div>
</div>
  
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
     <button type="submit" class="btn btn-primary" onclick="edit_data_keluarga(<?= $cek->ID ?>)">Ubah</button>
   </div>
   </form>
   </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>






<!-- Modal Edit KTP -->

<?php $no=1; foreach ($ktp as $k) : ?>
<div class="modal fade" id="editKTPModal" tabindex="-1" aria-labelledby="editKTPModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKTPModalLabel">Edit Data KTP</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="edit_data_ktp">
     <input type="hidden" name="id_ktp" value="<?= $k->ID ?>">
     <input type="hidden" value="<?= $this->uri->segment(3) ?>" id="staff_id" name="staff_id">

     <div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">NIK<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="nik" name="nik" value="<?= $k->Reg_no ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Alamat<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $k->Address ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">RT/RW<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="rt_rw" name="rt_rw" value="<?= $k->RT_RW ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Kelurahan/Desa<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= $k->Kelurahan_desa ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Kecamatan<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $k->Kecamatan ?>">
</div>

<div class="row mb-3">
  <div class="col">
<label for="exampleFormControlTextarea1" class="form-label">Mulai Berlaku<span class="required text-danger">*</span></label>
<input type="date" class="form-control" id="mulai_berlaku" name="mulai_berlaku" value="<?php  $originalDate = $k->Signed_date;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; ?>">
</div>
<div class="col">
<label for="exampleFormControlTextarea1" class="form-label">Masa Berakhir<span class="required text-danger">*</span></label>
<input type="date" class="form-control" id="masa_berakhir" name="masa_berakhir" value="<?php $originalDate = $k->Valid_to;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; ?>">
</div>
</div>

<div class="mb-3">
<label for="gambar" class="form-label">Dokumen Lama</span></label>
<div class="col-sm">
  <p><?= $k->Dokumen ?></p>
    <img src="<?= base_url('assets/dokumen_ktp/'.$k->Dokumen) ?>" class="img-thumbnail">
    <input type="hidden" value="<?= $k->Dokumen ?>" name="dokumen_lama">
  </div>
</div>

<div class="mb-3">
 <label for="gambar" class="form-label">Dokumen Baru</span></label>
 <div class="form-group row">
   <div class="col sm-10">
     <div class="row">
     <div class="col-sm-6">
       <div class="custom-file">
         <input type="file" class="custom-file-input" name="ktp_dokumen" id="ktp_dokumen">
         <label class="custom-file-label" for="ktp_dokumen"></label>
     </div>
       </div>
       <div class="col-sm-6">
       <img src="" class="img-thumbnail" id="image_ktp_dokumen">
       </div>
      </div>
   </div>
</div>
</div>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
     <button type="submit" class="btn btn-primary">Ubah</button>
   </div>
   </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>





<!-- Edit Data kontrak -->
<?php foreach ($kontrak as $k) : ?>
<div class="modal fade" id="editKontrak<?= $k->IDContract ?>Modal" tabindex="-1" aria-labelledby="editKontrak<?= $k->IDContract ?>ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKontrak<?= $k->IDContract ?>ModalLabel">Edit Data Kontrak</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="edit_data_kontrak<?=$k->IDContract ?>">
     <input type="hidden" name="id_kontrak" value="<?= $k->IDContract ?>">
     <input type="hidden" value="<?= $this->uri->segment(3) ?>" id="staff_id" name="staff_id">

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Status<span class="required text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="status" id="status"> 
  <option selected>Open this select menu</option>
  <?php foreach($status_kontrak as $sk): ?>
  <option value="<?= $sk->ID ?>" <?= $sk->Status == $k->STATUS ? 'selected' : '' ?>><?= $sk->Status ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Bidang<span class="required text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="bidang" id="bidang"> 
  <option selected>Open this select menu</option>
  <?php foreach($department as $d): ?>
  <option value="<?= $d->ID ?>" <?= $d->Departement == $k->Departement ? 'selected' : '' ?>><?= $d->Departement ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Sub Bidang<span class="required text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="sub_bidang" id="sub_bidang"> 
  <option selected>Open this select menu</option>
  <?php foreach($department_sub as $ds): ?>
  <option value="<?= $ds->ID ?>" <?= $ds->Sub_departement == $k->Sub_departement ? 'Selected' : '' ?>><?= $ds->Sub_departement ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
<label for="exampleDataList" class="form-label">Posisi</label>
<input class="form-control" list="datalistPosition" id="exampleDataList" placeholder="Type to search..." name="posisi" id="posisi" value="<?= $k->Position ?>">
<datalist id="datalistPosition">
  <?php foreach($position as $p): ?>
  <option value="<?= $p->ID ?>" <?= $p->Position == $k->Position ? 'selected' : '' ?>><?= $p->Position ?>
    <?php endforeach; ?>
</datalist>
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Level<span class="required text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="level" id="level"> 
  <option selected>Open this select menu</option>
  <?php foreach($level as $l): ?>
  <option value="<?= $l->ID ?>" <?= $l->Level == $k->LEVEL ? 'selected' : '' ?>><?= $l->Level ?></option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
<label for="exampleDataList" class="form-label">Lokasi Kantor</label>
<input class="form-control" list="datalistOffice" id="exampleDataList" placeholder="Type to search..." name="lokasi_kantor" id="lokasi_kantor" value="<?= $k->Office_location ?>">
<datalist id="datalistOffice">
  <?php foreach($lokasi_kantor as $lk): ?>
  <option value="<?= $lk->ID ?>"<?= $lk->Office_location == $k->Office_location ? 'selected' : '' ?>><?= $lk->Office_location ?>
    <?php endforeach; ?>
</datalist>
</div>

<div class="row mb-3">
  <div class="col">
<label for="exampleFormControlTextarea1" class="form-label">Mulai Bekerja<span class="required text-danger">*</span></label>
<input type="date" class="form-control" id="mulai_bekerja" name="mulai_bekerja" value="<?php  $originalDate = $k->Start_date;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; ?>">
</div>
<div class="col">
<label for="exampleFormControlTextarea1" class="form-label">Selesai Kontrak<span class="required text-danger">*</span></label>
<input type="date" class="form-control" id="selesai_kontrak" name="selesai_kontrak" value="<?php $originalDate = $k->Finish_date;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; ?>">
</div>
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Tanggal Berhenti<span class="required text-danger">*</span></label>
<input type="date" class="form-control" id="tanggal_berhenti" name="tanggal_berhenti" value="<?php if(!isset($k->Resign_date)){}else{$originalDate = $k->Resign_date;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate;} ?>">
</div>


<div class="mb-3">
<label for="gambar" class="form-label">Dokumen Lama</span></label>
<div class="col-sm">
  <p></p>
    <img src="<?= base_url('assets/dokumen_kontrak/'.$k->Dokumen) ?>" class="img-thumbnail">
    <input type="hidden" value="<?= $k->Dokumen ?>" name="dokumen_lama">
  </div>
</div>

<div class="mb-3">
 <label for="gambar" class="form-label">Dokumen Baru</span></label>
 <div class="form-group row">
   <div class="col sm-10">
     <div class="row">
     <div class="col-sm-6">
       <div class="custom-file">
         <input type="file" class="custom-file-input" name="kontrak_dokumen" id="kontrak_dokumen<?= $k->IDContract ?>" onclick="viewEditImage_Kontrak(<?= $k->IDContract ?>)">
         <label class="custom-file-label" for="kontrak_dokumen"></label>
     </div>
       </div>
       <div class="col-sm-6">
       <img src="" class="img-thumbnail" id="image_kontrak_dokumen<?= $k->IDContract ?>">
       </div>
      </div>
   </div>
</div>
</div>
  
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
     <button type="submit" class="btn btn-primary" onclick="edit_data_kontrak(<?= $k->IDContract ?>)">Ubah</button>
   </div>
   </form>
   </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>


  <!-- Modal Edit NPWP -->
<?php $no=1; foreach ($npwp as $n) : ?>
<div class="modal fade" id="editNPWPModal" tabindex="-1" aria-labelledby="editNPWPModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editNPWPModalLabel">Edit Data NPWP</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="edit_data_npwp">
     <input type="hidden" name="id_npwp" value="<?= $n->ID ?>">
     <input type="hidden" value="<?= $this->uri->segment(3) ?>" id="staff_id" name="staff_id">

     <div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">NPWP<span class="required text-danger">*</span></label>
<input type="text" class="form-control" id="no_npwp" name="no_npwp" value="<?= $n->No_NPWP ?>">
</div>

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Tanggal Terdaftar<span class="required text-danger">*</span></label>
<input type="date" class="form-control" id="tanggal_terdaftar" name="tanggal_terdaftar" value="<?php $originalDate = $n->Tanggal_terdaftar;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        echo $newDate; ?>">
</div>

<div class="mb-3">
<label for="gambar" class="form-label">Dokumen</span></label>
<div class="col-sm">
  <p><?= $n->Dokumen ?></p>
    <img src="<?= base_url('assets/dokumen_npwp/'.$n->Dokumen) ?>" class="img-thumbnail">
    <input type="hidden" value="<?= $n->Dokumen ?>" name="dokumen_lama">
  </div>
</div>

<div class="mb-3">
 <label for="gambar" class="form-label">Dokumen Baru</span></label>
 <div class="form-group row">
   <div class="col sm-10">
     <div class="row">
     <div class="col-sm-6">
       <div class="custom-file">
         <input type="file" class="custom-file-input" name="npwp_dokumen" id="npwp_dokumen">
         <label class="custom-file-label" for="npwp_dokumen"></label>
     </div>
       </div>
       <div class="col-sm-6">
       <img src="" class="img-thumbnail" id="image_npwp_dokumen">
       </div>
      </div>
   </div>
</div>
</div>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
     <button type="submit" class="btn btn-primary">Ubah</button>
   </div>
   </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>




<!-- Edit Data Keluarga -->
<?php foreach ($penilaian_kerja as $pn) : ?>
<div class="modal fade" id="editPenilaianKerja<?= $pn->ID ?>Modal" tabindex="-1" aria-labelledby="editPenilaianKerja<?= $pn->ID ?>ModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPenilaianKerja<?= $pn->ID ?>ModalLabel">Edit Data Penilaian Kerja</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" id="edit_data_penilaian_kerja<?=$pn->ID ?>">
     <input type="hidden" name="id_penilaian_kerja" value="<?= $pn->ID ?>">
     <input type="hidden" value="<?= $this->uri->segment(3) ?>" id="staff_id" name="staff_id">

     <div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Skor Penilaian Kerja<span class="required text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="skor" id="skor">
  <option selected>Open this select menu</option>
  <?php foreach($skor_penilaian as $sp) : ?>
  <option value="<?= $sp->ID ?>" <?= $sp->ID == $pn->Skor_penilaian_kinerja ? 'selected' : '' ?>><?= $sp->Poin. ', '.$sp->Konversi.', '.$sp->Keterangan  ?></option>
  <?php endforeach; ?>
</select> 
</div>  

<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Rekomendasi Atasan<span class="required text-danger">*</span></label>
<textarea type="text" class="form-control" id="rekomendasi_atasan" name="rekomendasi_atasan" value="<?= $pn->Rekomendasi_atasan ?>" rows="4"><?= $pn->Rekomendasi_atasan ?></textarea>
</div>

<div class="mb-3">
<label for="gambar" class="form-label">Dokumen Lama</span></label>
<div class="col-sm">
  <p></p>
    <img src="<?= base_url('assets/dokumen_penilaian_kerja/'.$pn->Lampiran) ?>" class="img-thumbnail">
    <input type="hidden" value="<?= $pn->Lampiran ?>" name="dokumen_lama">
  </div>
</div>

<div class="mb-3">
 <label for="gambar" class="form-label">Dokumen Baru</span></label>
 <div class="form-group row">
   <div class="col sm-10">
     <div class="row">
     <div class="col-sm-6">
       <div class="custom-file">
         <input type="file" class="custom-file-input" name="penilaian_kerja_dokumen" id="penilaian_kerja_dokumen<?= $pn->ID ?>" onclick="viewEditImage_Penilaian_Kerja(<?= $pn->ID ?>)">
         <label class="custom-file-label" for="penilaian_kerja_dokumen"></label>
     </div>
       </div>
       <div class="col-sm-6">
       <img src="" class="img-thumbnail" id="image_penilaian_kerja_dokumen<?= $pn->ID ?>">
       </div>
      </div>
   </div>
</div>
</div>
  
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
     <button type="submit" class="btn btn-primary" onclick="edit_data_penilaian_kerja(<?= $pn->ID ?>)">Ubah</button>
   </div>
   </form>
   </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>




 