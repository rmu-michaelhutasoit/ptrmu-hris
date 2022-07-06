<footer class="main-footer">
    <strong> &copy; <?= date('Y') ?> Human Resource Information System (HRIS)<a href="https://katinganproject.com/"> PT Rimba Makmur Utama</a>.</strong>
     All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->

<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>

<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE for demos purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>assets/javascript/myscript.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url() ?>assets/paginationjs/dist/pagination.js"></script>
<script src="<?= base_url() ?>assets/paginationjs/dist/pagination.min.js"></script>



<!-- checkbox menu -->
<script>
  $(document).ready(function(){
  
})
</script>
<script>
 
</script>

<script>
function hapus_menu(id_menu){
  Swal.fire({
  title: 'Anda yakin?',
  text: "Anda tidak akan dapat mengembalikan ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
              url:   "<?php echo base_url('Menu_manajemen/hapus_menu') ?>",
              type: "POST",
              data: {
                id_menu : id_menu
              },
              success:function(response){
                if (response == 1) {
                  Swal.fire(
                      'Dihapus!',
                      'Menu Berhasil Dihapus.',
                      'success'
                    )
                    $("#user-menu").load(" #user-menu");
                }else if (response == 2){
                  Swal.fire(
                      'Oops!',
                      'Ada Kesalahan',
                      'warning'
                    )
                }            
          }
        })
        }
        })
        }
</script>

<script>
function edit_menu(id_menu){
  $("#edit_menu"+id_menu).submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#edit_menu"+id_menu).valid()) {
          $.ajax({
              url:   "<?php echo base_url('Menu_manajemen/ubah_menu') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Menu Berhasil Diubah!' +response,
                        'success'
                      )
                  }else if(response == 2){
                      Swal.fire(
                        'Gagal!',
                        'Oops Ada Kesalahan!' +response,
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

    $('#edit_menu'+id_menu).validate({  
            rules: {
              menu: {
                required: true,
              },
            },
            messages: {
             menu: {
                required: "Menu Tidak Boleh Kosong",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        }
</script>

<script>
   $(document).ready(function () {
  $("#tambah_menu").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#tambah_menu").valid()) {
          $.ajax({
              url:   "<?php echo base_url('Menu_manajemen/tambah_menu') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Menu Baru Berhasil Ditambahkan!' +response,
                        'success'
                      )
                  }else if(response == 2){
                      Swal.fire(
                        'Gagal!',
                        'Oops Ada Kesalahan!' +response,
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

    $('#tambah_menu').validate({  
            rules: {
              menu: {
                required: true,
              },
            },
            messages: {
             menu: {
                required: "Menu Tidak Boleh Kosong",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>


<!-- <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100,700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  })
</script>
<script>
  $(function () {
   //-------------
    //- BAR CHART -
    //-------------

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

 //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })


     // This will get the first returned node in the jQuery collection.
     new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

  })
</script>
<script>
  $(function () {

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

   var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script> -->
<script>
    $(document).ready(function () {
  $("#tambah_akun_baru").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#tambah_akun_baru").valid()) {
          $.ajax({
              url:   "<?php echo base_url('Auth/buat_akun_pegawai') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Akun Berhasil Dibuat!' +response,
                        'success'
                      )
                  }else if(response == 2){
                      Swal.fire(
                        'Gagal!',
                        'Email Sudah Digunakan!' +response,
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

    $('#tambah_akun_baru').validate({  
            rules: {
              email: {
                required: true,
                email:true
              },
              password: {
                required: true,
              },
              is_active: {
                required: true,
              },
              user_role: {
                required: true,
              },
            },
            messages: {
             email: {
                required: "Email Tidak Boleh Kosong",
              },
              password: {
                required: "Password Tidak Boleh Kosong",
              },
             is_active: {
                required: "Status Akun Tidak Boleh Kosong",
              },
              user_role: {
                required: "Level User Tidak Boleh Kosong",
            },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>


<script>
  function viewEditImage_detail_staff(id_staff){
 $('#gambar_detail_staff'+id_staff).on('change', function(){
 var kirim = (this).files[0];
 viewImagesImageDetailStaff(kirim);
});

function viewImagesImageDetailStaff(file){
var reader = new FileReader();
reader.onload=function(){
$('#image_detail_staff'+id_staff).attr('src', reader.result);
}
reader.readAsDataURL(file);
}
}
</script>

<script>
  //edit dokumen penilaian kerja
  function edit_detail_data_staff(id_staff){
$("#edit_detail_data_staff"+id_staff).submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#edit_detail_data_staff"+id_staff).valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/edit_detail_data_staff') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Diubah!' +response,
                        'success'
                      )
                      $("#edit_detail_data_staff").load(" #edit_detail_data_staff");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })


    $('#edit_detail_data_staff'+id_staff).validate({  
            rules: {
            nama_lengkap: {
                required: true,
              },
              lokasi_kantor: {
                required: true,
              },
              email: {
                required: true,
                email: true
              },
              no_hp: {
                required: true,
              },
              alamat: {
                required: true,
              },
              jenis_kelamin: {
                required: true,
              },
              pendidikan_terakhir: {
                required: true,
              },
              tempat_lahir: {
                required: true,
              },
              pernikahan_terakhir: {
                required: true,
              },
              status: {
                required: true,
              },
            },
            messages: {
              nama_lengkap: {
                required: "Nama Lengkap Tidak Boleh Kosong",
              },
              lokasi_kantor: {
                required: "Lokasi Kantor Tidak Boleh Kosong",
              },
              email: {
                required: "Email Tidak Boleh Kosong",
                email: "Email Tidak Valid! Mohon Sertakan @."
              },
              no_hp: {
                required: "No Hp Tidak Boleh Kosong",
              },
              alamat: {
                required: "Alamat Tidak Boleh Kosong",
              },
              jenis_kelamin: {
                required: "Jenis Kelamin Tidak Boleh Kosong",
              },
              pendidikan_terakhir: {
                required: "Pendidikan Terakhir Tidak Boleh Kosong",
              },
              tempat_lahir: {
                required: "Tempat Lahir Tidak Boleh Kosong",
              },
              pernikahan_terakhir: {
                required: "Pernikahan Terakhir Tidak Boleh Kosong",
              },
              status: {
                required: "Status Tidak Boleh Kosong",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },  
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
      }
</script>

<script>
  function viewEditImage_Penilaian_Kerja(id_penilaian_kerja){
 $('#penilaian_kerja_dokumen'+id_penilaian_kerja).on('change', function(){
 var kirim = (this).files[0];
 viewImagesPenilaianKerjaDokumen(kirim);
});

function viewImagesPenilaianKerjaDokumen(file){
var reader = new FileReader();
reader.onload=function(){
$('#image_penilaian_kerja_dokumen'+id_penilaian_kerja).attr('src', reader.result);
}
reader.readAsDataURL(file);
}
}
</script>


<script>
  //edit dokumen penilaian kerja
  function edit_data_penilaian_kerja(id_penilaian_kerja){
$("#edit_data_penilaian_kerja"+id_penilaian_kerja).submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#edit_data_penilaian_kerja"+id_penilaian_kerja).valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/edit_data_penilaian_kerja') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Diubah!' +response,
                        'success'
                      )
                      $("#penilaian-kerja").load(" #penilaian-kerja");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })


    $('#edit_data_penilaian_kerja'+id_penilaian_kerja).validate({  
            rules: {
            skor: {
                required: true,
              },
            },
            messages: {
              skor: {
                required: "Skor Penilaian Kerja Tidak Boleh Kosong",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },  
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
      }
</script>

<script>
  //edit dokumen npwp
  $(document).ready(function(){
$("#edit_data_npwp").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#edit_data_npwp").valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/edit_data_npwp') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Diubah!' +response,
                        'success'
                      )
                      $("#npwp").load(" #npwp");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })


    $('#edit_data_npwp').validate({  
            rules: {
            no_npwp: {
                required: true,
              },
            tanggal_terdaftar: {
                required: true,
              },
            },
            messages: {
              no_npwp: {
                required: "No NPWP Tidak Boleh Kosong",
              },
              tanggal_terdaftar: {
                required: "Tanggal Terdaftar Tidak Boleh Kosong",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },  
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>

<script>
 $('#npwp_dokumen').on('change', function(){
 var kirim = (this).files[0];
 viewImagesNPWPDokumen(kirim);
});

function viewImagesNPWPDokumen(file){
var reader = new FileReader();
reader.onload=function(){
$('#image_npwp_dokumen').attr('src', reader.result);
}
reader.readAsDataURL(file);
}</script>

<script>
  function viewEditImage_Kontrak(id_kontrak){
 $('#kontrak_dokumen'+id_kontrak).on('change', function(){
 var kirim = (this).files[0];
 viewImagesKontrakDokumen(kirim);
});

function viewImagesKontrakDokumen(file){
var reader = new FileReader();
reader.onload=function(){
$('#image_kontrak_dokumen'+id_kontrak).attr('src', reader.result);
}
reader.readAsDataURL(file);
}
}
</script>


<script>
  //edit dokumen kontrak
  function edit_data_kontrak(id_kontrak){
$("#edit_data_kontrak"+id_kontrak).submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#edit_data_kontrak"+id_kontrak).valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/edit_data_kontrak') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Diubah!' +response,
                        'success'
                      )
                      $("#kontrak").load(" #kontrak");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })


    $('#edit_data_kontrak'+id_kontrak).validate({  
            rules: {
            status: {
                required: true,
              },
              bidang: {
                required: true,
              },
             sub_bidang: {
                required: true,
              },
              posisi: {
                required: true,
              },
              level: {
                required: true,
              },
              lokasi_kantor: {
                required: true,
              },
              mulai_bekerja: {
                required: true,
              },
              selesai_kontrak: {
                required: true,
              },
              tanggal_berhenti: {
                required: true,
              },
            },
            messages: {
              status: {
                required: "Status Tidak Boleh Kosong",
              },
              bidang: {
                required: "Bidang Tidak Boleh Kosong",
              },
              sub_bidang: {
                required: "Sub Bidang Tidak Boleh Kosong",
              },
              posisi: {
                required: "Posisi Tidak Boleh Kosong",
              },
              level: {
                required: "Level Tidak Boleh Kosong",
              },
              lokasi_kantor: {
                required: "Lokasi Kantor Tidak Boleh Kosong",
              },
              mulai_bekerja: {
                required: "Tanggal Mulai Tidak Boleh Kosong",
              },
              selesai_kontrak: {
                required: "Tanggal Selesai Tidak Boleh Kosong",
              },
              tanggal_berhenti: {
                required: "Tanggal Berhenti Tidak Boleh Kosong",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },  
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
      }
</script>


<script>
 $('#ktp_dokumen').on('change', function(){
 var kirim = (this).files[0];
 viewImagesKTPDokumen(kirim);
});

function viewImagesKTPDokumen(file){
var reader = new FileReader();
reader.onload=function(){
$('#image_ktp_dokumen').attr('src', reader.result);
}
reader.readAsDataURL(file);
}
</script>


<script>
  //edit dokumen ktp
  $(document).ready(function(){
$("#edit_data_ktp").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#edit_data_ktp").valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/edit_data_ktp') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Diubah!' +response,
                        'success'
                      )
                      $("#ktp").load(" #ktp");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })


    $('#edit_data_ktp').validate({  
            rules: {
              nik: {
                required: true,
              },
            alamat: {
                required: true,
              },
              rt_rw: {
                required: true,
              },
             kelurahan: {
                required: true,
              },
              kecamatan: {
                required: true,
              },
              mulai_berlaku: {
                required: true,
              },
              masa_berakhir: {
                required: true,
              },
            },
            messages: {
              nik: {
                required: "NIK Tidak Boleh Kosong",
              },
              alamat: {
                required: "Alamat Tidak Boleh Kosong",
              },
              rt_rw: {
                required: "RT RW Tidak Boleh Kosong",
              },
              kelurahan: {
                required: "Kelurahan Tidak Boleh Kosong",
              },
              kecamatan: {
                required: "Kecamatan Tidak Boleh Kosong",
              },
              mulai_berlaku: {
                required: "Tanggal Mulai Berlaku Tidak Boleh Kosong",
              },
              masa_berakhir: {
                required: "Masa Berakhir Tidak Boleh Kosong",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },  
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>


<script>
  function viewEditImage_Keluarga(id_keluarga){
 $('#keluarga_dokumen'+id_keluarga).on('change', function(){
 var kirim = (this).files[0];
 viewImageskeluargaDokumen(kirim);
});

function viewImageskeluargaDokumen(file){
var reader = new FileReader();
reader.onload=function(){
$('#image_keluarga_dokumen'+id_keluarga).attr('src', reader.result);
}
reader.readAsDataURL(file);
}
}
</script>
<script>
  //edit dokumen keluarga
  function edit_data_keluarga(id_keluarga){
$("#edit_data_keluarga"+id_keluarga).submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#edit_data_keluarga"+id_keluarga).valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/edit_data_keluarga') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Diubah!' +response,
                        'success'
                      )
                      $("#keluarga").load(" #keluarga");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })


    $('#edit_data_keluarga'+id_keluarga).validate({  
            rules: {
              nik: {
                required: true,
              },
            nama: {
                required: true,
              },
              no_hp: {
                required: true,
              },
              email: {
                required: true,
                email:true
              },
              jenis_kelamin: {
                required: true,
              },
              tanggal_lahir: {
                required: true,
              },
              golongan_darah: {
                required: true,
              },
              hubungan: {
                required: true,
              },
            },
            messages: {
              nik: {
                required: "NIK Tidak Boleh Kosong",
              },
              nama: {
                required: "Nama Tidak Boleh Kosong",
              },
              no_hp: {
                required: "No Hp Tidak Boleh Kosong",
              },
              email: {
                required: "Email Tidak Boleh Kosong",
                email:"Email Tidak Valid, Mohon Sertakan @"
              },
              jenis_kelamin: {
                required: "Jenis Kelamin Tidak Boleh Kosong",
              },
              tanggal_lahir: {
                required: "Tanggal Lahir Tidak Boleh Kosong",
              },
              golongan_darah: {
                required: "Golongan Darah Tidak Boleh Kosong",
              },
              hubungan: {
                required: "Hubungan Tidak Boleh Kosong",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },  
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        }
</script>

<script>
  $(document).ready(function(){
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

   //edit dokumen bank
   $('#bank_dokumen').on('change', function(){
    var kirim = (this).files[0];
    view_bankDokumen(kirim);
  });
  
  function view_bankDokumen(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image_bank_dokumen').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }
})


$("#edit_data_bank").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#edit_data_bank").valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/edit_data_bank') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Diubah!' +response,
                        'success'
                      )
                      $("#bank").load(" #bank");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })


    $('#edit_data_bank').validate({  
            rules: {
              nama_pemilik: {
                required: true,
              },
            nomor_rekening: {
                required: true,
              },
            },
            messages: {
              nama_pemilik: {
                required: "Pemilik Tidak Boleh Kosong",
              },
              nomor_rekening: {
                required: "Nomor Rekening Tidak Boleh Kosong",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });


</script>
<script>
function edit_data_asuransi(id_asuransi){
    $("#edit_data_asuransi"+id_asuransi).submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#edit_data_asuransi"+id_asuransi).valid()) {
          $.ajax({
            url:  "<?php echo base_url('Daftar_staff/edit_data_asuransi') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Diubah!' +response,
                        'success'
                      )
                      $("#asuransi").load(" #asuransi");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })


    $('#edit_data_asuransi'+id_asuransi).validate({  
            rules: {
             kategori_asuransi: {
                required: true,
              },
              nomor_registrasi: {
                required: true,
              },
            tanggal_mulai: {
                required: true,
              },
              tanggal_kadaluwarsa: {
                required: true,
              },
            },
            messages: {
            kategori_asuransi: {
                required: "Wajib Input Kategori Asuransi",
              },
              nomor_registrasi: {
                required: "Wajib Input Nomor Registrasi",
              },
              tanggal_mulai: {
                required: "Wajib Input Tanggal Mulai",
              },
              tanggal_kadaluwarsa: {
                required: "Wajib Input Tanggal Kadaluwarsa",
            },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
}
</script>

<script>
  
  function viewEditImage(id_asuransi){
 
    $('#asuransi_dokumen'+id_asuransi).on('change', function(){
    var kirim = (this).files[0];
    viewImagesAsuransiDokumen(kirim);
  });
  
  function viewImagesAsuransiDokumen(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image_asuransi_dokumen'+id_asuransi).attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }
  }
</script>

<script>
  $(document).ready(function(){
    $("#edit_asuransi").click( function(){
        var kategori_asuransi = $(this).data('kategori_asuransi');
        $("#kategori_asuransi").val(kategori_asuransi);
  })
})
</script>

<script>
  function hapus_data_asuransi(id_asuransi){
    Swal.fire({
  title: 'Anda yakin?',
  text: "Anda tidak akan dapat mengembalikan ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
              url:   "<?php echo base_url('Daftar_staff/hapus_data_asuransi') ?>",
              type: "POST",
              data: {
                id_asuransi : id_asuransi
              },
              success:function(response){
                if (response == 1) {
                  Swal.fire(
                      'Dihapus!',
                      'Data Asuransi Berhasil Dihapus.',
                      'success'
                    )
                    $("#asuransi").load(" #asuransi");
                }else if (response == 2){
                  Swal.fire(
                      'Oops!',
                      'Ada Kesalahan',
                      'warning'
                    )
                }            
          }
        })
        }
        })
         }

function hapus_data_bank(id_bank){
  Swal.fire({
  title: 'Anda yakin?',
  text: "Anda tidak akan dapat mengembalikan ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
              url:   "<?php echo base_url('Daftar_staff/hapus_data_bank') ?>",
              type: "POST",
              data: {
                id_bank : id_bank
              },
              success:function(response){
                if (response == 1) {
                  Swal.fire(
                      'Dihapus!',
                      'Data Bank Berhasil Dihapus.',
                      'success'
                    )
                    $("#bank").load(" #bank");
                }else if (response == 2){
                  Swal.fire(
                      'Oops!',
                      'Ada Kesalahan',
                      'warning'
                    )
                }            
          }
        })
        }
        })
}

function hapus_data_keluarga(id_keluarga){
  Swal.fire({
  title: 'Anda yakin?',
  text: "Anda tidak akan dapat mengembalikan ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
              url:   "<?php echo base_url('Daftar_staff/hapus_data_keluarga') ?>",
              type: "POST",
              data: {
                id_keluarga : id_keluarga
              },
              success:function(response){
                if (response == 1) {
                  Swal.fire(
                      'Dihapus!',
                      'Data Keluarga Berhasil Dihapus.',
                      'success'
                    )
                    $("#keluarga").load(" #keluarga");
                }else if (response == 2){
                  Swal.fire(
                      'Oops!',
                      'Ada Kesalahan',
                      'warning'
                    )
                }            
          }
        })
        }
        })
}

function hapus_data_ktp(id_ktp){
  Swal.fire({
  title: 'Anda yakin?',
  text: "Anda tidak akan dapat mengembalikan ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
              url:   "<?php echo base_url('Daftar_staff/hapus_data_ktp') ?>",
              type: "POST",
              data: {
                id_ktp : id_ktp
              },
              success:function(response){
                if (response == 1) {
                  Swal.fire(
                      'Dihapus!',
                      'Data KTP Berhasil Dihapus.',
                      'success'
                    )
                    $("#ktp").load(" #ktp");
                }else if (response == 2){
                  Swal.fire(
                      'Oops!',
                      'Ada Kesalahan',
                      'warning'
                    )
                }            
          }
        })
        }
        })
}

function hapus_data_kontrak(id_kontrak){
  Swal.fire({
  title: 'Anda yakin?',
  text: "Anda tidak akan dapat mengembalikan ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
              url:   "<?php echo base_url('Daftar_staff/hapus_data_kontrak') ?>",
              type: "POST",
              data: {
                id_kontrak : id_kontrak
              },
              success:function(response){
                if (response == 1) {
                  Swal.fire(
                      'Dihapus!',
                      'Data Kontrak Berhasil Dihapus.',
                      'success'
                    )
                    $("#kontrak").load(" #kontrak");
                }else if (response == 2){
                  Swal.fire(
                      'Oops!',
                      'Ada Kesalahan',
                      'warning'
                    )
                }            
          }
        })
        }
        })
      }
        function hapus_data_npwp(id_npwp){
  Swal.fire({
  title: 'Anda yakin?',
  text: "Anda tidak akan dapat mengembalikan ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
              url:   "<?php echo base_url('Daftar_staff/hapus_data_npwp') ?>",
              type: "POST",
              data: {
                id_npwp : id_npwp
              },
              success:function(response){
                if (response == 1) {
                  Swal.fire(
                      'Dihapus!',
                      'Data NPWP Berhasil Dihapus.',
                      'success'
                    )
                    $("#npwp").load(" #npwp");
                }else if (response == 2){
                  Swal.fire(
                      'Oops!',
                      'Ada Kesalahan',
                      'warning'
                    )
                }            
          }
        })
        }
        })
}

function hapus_data_penilaian_kerja(id_penilaian_kerja){
  Swal.fire({
  title: 'Anda yakin?',
  text: "Anda tidak akan dapat mengembalikan ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
              url:   "<?php echo base_url('Daftar_staff/hapus_data_penilaian_kerja') ?>",
              type: "POST",
              data: {
                id_penilaian_kerja : id_penilaian_kerja
              },
              success:function(response){
                if (response == 1) {
                  Swal.fire(
                      'Dihapus!',
                      'Data Penilaian Kerja Berhasil Dihapus.',
                      'success'
                    )
                    $("#penilaian_kerja").load(" #penilaian_kerja");
                }else if (response == 2){
                  Swal.fire(
                      'Oops!',
                      'Ada Kesalahan',
                      'warning'
                    )
                }            
          }
        })
        }
        })
}

</script>
<script>
   $(document).ready(function () {
  $("#staff_baru").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#staff_baru").valid()) {
          $.ajax({
              url:   "<?php echo base_url('Dashboard/tambah_staff_baru') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Baru Berhasil Ditambahkan!' +response,
                        'success'
                      )
                  }else if(response == 2){
                      Swal.fire(
                        'Gagal!',
                        'Staff Sudah Ada!' +response,
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

    $('#staff_baru').validate({  
            rules: {
              nama_lengkap: {
                required: true,
              },
              lokasi_kantor: {
                required: true,
              },
              email: {
                required: true,
                email: true
              },
              no_hp: {
                required: true,
              },
              alamat: {
                required: true,
              },
              jenis_kelamin: {
                required: true
              },
              pendidikan_terakhir: {
                required: true
              },
              tempat_lahir: {
                required: true
              },
              tanggal_lahir: {
                required: true
              },
              pernikahan_terakhir: {
                required: true
              },
              status_kontrak: {
                required: true
              },
            },
            messages: {
             nama_lengkap: {
                required: "Wajib Input Nama Lengkap",
              },
              lokasi_kantor: {
                required: "Wajib Input Lokasi Kantor",
              },
              email: {
                required: "Wajib Input Email",
                email: "Email Tidak Valid"
              },
              no_hp: {
                required: "Wajib Input No Handphone",
            },
            alamat: {
                required: "Wajib Input Alamat",
            },
             jenis_kelamin: {
                required: "Wajib Input Jenis Kelamin"
            },
             pendidikan_terakhir: {
                required: "Wajib Input Pendidikan Terakhir"
            },
             tempat_lahir: {
                required: "Wajib Input Tempat Lahir"
            },
             tanggal_lahir: {
                required: "Wajib Input Tanggal Lahir"
            },
             pernikahan_terakhir: {
                required: "Wajib Input Pernikahan Terakhir"
            },
             status_kontrak: {
                required: "Wajib Input Status Kontrak"
            },
        
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>



<script>
   $(document).ready(function () {
  $("#tambah_data_asuransi").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#tambah_data_asuransi").valid()) {
          $.ajax({
              url:   "<?php echo base_url('Daftar_staff/tambah_data_asuransi') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Baru Berhasil Ditambahkan!' +response,
                        'success'
                      )
                      $("#asuransi").load(" #asuransi");
                  }else if(response == 2){
                      Swal.fire(
                        'Gagal!',
                        'Data Sudah Ada!' +response,
                        'warning'
                      )
                  }else if(response == 3){
                      Swal.fire(
                        'Gagal!',
                        'Ukuran Gambar Terlalu Besar Max 100Kb!' +response,
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

    $('#tambah_data_asuransi').validate({  
            rules: {
             kategori_asuransi: {
                required: true,
              },
              nomor_registrasi: {
                required: true,
              },
              tanggal_mulai: {
                required: true
              },
              tanggal_kadaluwarsa: {
                required: true
              },
              dokumen_asuransi: {
                required: true
              },  
            },
            messages: {
             kategori_asuransi: {
                required: "Wajib Input Kategori Asuransi",
              },
              nomor_registrasi: {
                required: "Wajib Input Nomor Registrasi",
              },
              faskes_tingkat_I: {
                required: "Wajib Input Faskes Tingkat I",
              },
              kelas_rawat: {
                required: "Wajib Input Kelas Rawat",
            },
            coverage: {
                required: "Wajib Input coverage",
            },
             tanggal_mulai: {
                required: "Wajib Input Tanggal Mulai"
            },
             tanggal_kadaluwarsa: {
                required: "Wajib Input Masa Berakhir"
            },
             dokumen_asuransi: {
                required: "Wajib Input Dokumen Asuransi"
            },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>



<script>
   $(document).ready(function () {
  $("#tambah_data_keluarga").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#tambah_data_keluarga").valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/tambah_data_keluarga') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Keluarga Berhasil Ditambahkan!' +response,
                        'success'
                      )
                      $("#keluarga").load(" #keluarga");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

    $('#tambah_data_keluarga').validate({  
            rules: {
             no_kk: {
                required: true,
                maxlength: 16,
              },
              nik: {
                required: true,
                maxlength: 16,
              },
              nama: {
                required: true,
              },
              no_hp: {
                required: true,
              },
              email:{
                required: true,
                email:true,
              },
             jenis_kelamin: {
                required: true,
              },
              tanggal_lahir: {
                required: true,
              },
              golongan_darah: {
                required: true,
              },
              hubungan: {
                required: true,
              },
              dokumen_kk: {
                required: true,
              },
            },
            messages: {
            no_kk: {
                required: "Wajib Input Nama Bank",
                maxlength: "No KK Harus 16 Digit"
              },
              nik: {
                required: "Wajib Input Nama Pemilik",
                maxlength: "NIK Harus 16 Digit"
              },
              nama: {
                required: "Wajib Input Nomor Rekening",
              },
              no_hp: {
                required: "Wajib Input No HP",
            },
            jenis_kelamin: {
                required: "Wajib Input Jenis Kelamin",
            },
            tanggal_lahir: {
                required: "Wajib Input Tanggal Lahir",
            },
            golongan_darah: {
                required: "Wajib Input Golongan Darah",
            },
            hubungan: {
                required: "Wajib Input Hubungan",
            },
           dokumen_kk: {
                required: "Wajib Input Dokumen Kartu Keluarga",
            },
        
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>

<script>
   $(document).ready(function () {
  $("#tambah_data_ktp").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#tambah_data_ktp").valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/tambah_data_ktp') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data KTP Berhasil Ditambahkan!' +response,
                        'success'
                      )
                      $("#ktp").load(" #ktp");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

    $('#tambah_data_ktp').validate({  
            rules: {
             no_registrasi: {
                required: true,
              },
              alamat: {
                required: true,
              },
              rt_rw: {
                required: true,
              },
              kelurahan_desa: {
                required: true,
              },
              kecamatan:{
                required: true,
              },
             kadaluwarsa: {
                required: true,
              },
              tanggal_dibuat: {
                required: true,
              },
              dokumen_kk: {
                required: true,
              },
            },
            messages: {
            no_registrasi: {
                required: "Wajib Input Nomor Registrasi",
              },
              alamat: {
                required: "Wajib Input Alamat",
              },
              rt_rw: {
                required: "Wajib Input RT RW",
              },
              kelurahan_desa: {
                required: "Wajib Input Kelurahan",
            },
            kecamatan: {
                required: "Wajib Input Kecamatan",
            },
            kadaluwarsa: {
                required: "Wajib Input Kadaluwarsa",
            },
            tanggal_dibuat: {
                required: "Wajib Input Tanggal Dibuat",
            },
            dokumen_ktp: {
                required: "Wajib Input Dokumen KTP",
            },
        
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>

<script>
   $(document).ready(function () {
  $("#tambah_data_kontrak").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#tambah_data_kontrak").valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/tambah_data_kontrak') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Kontrak Berhasil Ditambahkan!' +response,
                        'success'
                      )
                      $("#kontrak").load(" #kontrak");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

        
    $('#tambah_data_kontrak').validate({  
            rules: {
             no_reg_pegawai: {
                required: true,
              },
              status: {
                required: true,
              },
              bidang: {
                required: true,
              },
              sub_bidang: {
                required: true,
              },
              position:{
                required: true,
              },
             level: {
                required: true,
              },
             domisili: {
                required: true,
              },
             lokasi_kantor: {
                required: true,
              },
              mulai_kontrak: {
                required: true,
              },
              selesai_kontrak: {
                required: true,
              },
              tanggal_resign: {
                required: true,
              },
              dokumen_kontrak: {
                required: true,
              },
            },
            messages: {
            no_reg_pegawai: {
                required: "Wajib Input Nomor Registrasi Pegawai",
              },
             status: {
                required: "Wajib Input Alamat",
              },
             bidang: {
                required: "Wajib Input RT RW",
              },
              sub_bidang: {
                required: "Wajib Input Kelurahan",
            },
            position: {
                required: "Wajib Input Kecamatan",
            },
            level: {
                required: "Wajib Input Kadaluwarsa",
            },
            domisili: {
                required: "Wajib Input Tanggal Dibuat",
            },
            lokasi_kantor: {
                required: "Wajib Input Dokumen KTP",
            },
            mulai_kontrak: {
                required: "Wajib Input Mulai Kontrak",
              },
            selesai_kontrak: {
                required: "Wajib Input Selesai Kontrak",
              },
            tanggal_resign: {
                required: "Wajib Input Tanggal Resign",
              },
              dokumen_kontrak: {
                required: "Wajib Input Dokumen Kontrak",
              },
        
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>

<script>
   $(document).ready(function () {
  $("#tambah_data_npwp").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#tambah_data_npwp").valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/tambah_data_npwp') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data NPWP Berhasil Ditambahkan!' +response,
                        'success'
                      )
                      $("#npwp").load(" #npwp");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

        
    $('#tambah_data_npwp').validate({  
            rules: {
             no_npwp: {
                required: true,
              },
              tanggal_terdaftar: {
                required: true,
              },
              dokumen_npwp: {
                required: true,
              },
            },
            messages: {
            no_npwp: {
                required: "Wajib Input Nomor NPWP",
              },
             tanggal_terdaftar: {
                required: "Wajib Input Tanggal Terdaftar",
              },
             dokumen_npwp: {
                required: "Wajib Input Dokumen NPWP",
              },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>


<script>
   $(document).ready(function () {
  $("#tambah_data_penilaian_kerja").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      if ($("#tambah_data_penilaian_kerja").valid()) {
          $.ajax({
              url:  "<?php echo base_url('Daftar_staff/tambah_data_penilaian_kerja') ?>",
              type: "POST",
              data: formData,
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                  if (response == 1) {
                      Swal.fire(
                        'Berhasil!',
                        'Data Penilaian Kerja Berhasil Ditambahkan!' +response,
                        'success'
                      )
                      $("#penilaian_kerja").load(" #penilaian_kerja");
                  }else{
                    Swal.fire(
                        'Oops!',
                        'Terjadi Kesalahan!',
                        'warning'
                      )
                  }
              }
          });
        }else{
     
        }
        })

        
    $('#tambah_data_penilaian_kerja').validate({  
            rules: {
             kategori_penilaian: {
                required: true,
              },
              skor_penilaian: {
                required: true,
              },
              rekomendasi_atasan: {
                required: true,
              },
              dokumen_penilaian_kerja: {
                required: true,
              },
            },
            messages: {
            kategori_penilaian: {
                required: "Wajib Pilih Kategori Penilaian",
              },
            skor_penilaian: {
                required: "Wajib Pilih Skor Penilaian",
              },
             rekomendasi_atasan: {
                required: "Wajib Input Rekomendasi Atasan",
              },
              dokumen_penilaian_kerja: {
                required: "Wajib Input Dokumen Penilaian Kerja",
            },
          },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>


<script>
  $(document).ready(function () {
   $('#search_staff').keyup(function(){
     $.ajax({
       url: "<?= base_url('Daftar_staff/search_staff') ?>",
       type: "POST",
       data: {cari:$(this).val()},
       success:function(data){
        $('#staff-profile').html(data)
       }
     })
   })
})
</script>
<script>
 
</script>
<script>
  $(document).ready(function () {
$('#gambar').on('change', function(){
    var kirim = (this).files[0];
    viewImages(kirim);
  });
  
  function viewImages(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }

  //dokumen_asuransi
  $('#dokumen_asuransi').on('change', function(){
    var kirim = (this).files[0];
    view_dokumenAsuransi(kirim);
  });
  
  function view_dokumenAsuransi(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image_dokumen_asuransi').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }

   //dokumen bank
   $('#dokumen_bank').on('change', function(){
    var kirim = (this).files[0];
    view_DokumenBank(kirim);
  });
  
  function view_DokumenBank(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image_dokumen_bank').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }

  //dokumen kk
  $('#dokumen_kk').on('change', function(){
    var kirim = (this).files[0];
    view_DokumenKK(kirim);
  });
  
  function view_DokumenKK(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image_dokumen_kk').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }


  //dokumen ktp
  $('#dokumen_ktp').on('change', function(){
    var kirim = (this).files[0];
    view_DokumenKTP(kirim);
  });
  
  function view_DokumenKTP(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image_dokumen_ktp').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }


  //dokumen kontrak
  $('#dokumen_kontrak').on('change', function(){
    var kirim = (this).files[0];
    view_DokumenKontrak(kirim);
  });
  
  function view_DokumenKontrak(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image_dokumen_kontrak').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }

  //dokumen kontrak
  $('#dokumen_npwp').on('change', function(){
    var kirim = (this).files[0];
    view_DokumenKontrak(kirim);
  });
  
  function view_DokumenNPWP(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image_dokumen_npwp').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }

  
  //dokumen penilaian kerja
  $('#dokumen_penilaian_kerja').on('change', function(){
    var kirim = (this).files[0];
    view_DokumenPenilaian_kerja(kirim);
  });
  
  function view_DokumenPenilaian_kerja(file){
  var reader = new FileReader();
  reader.onload=function(){
  $('#image_dokumen_penilaian_kerja').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
  }
});
</script>
<script>
    $(function () {
      $('.select2').select2()
    });
</script>
<script>
function simpleTemplating(data) {
    var html = '';
    $.each(data, function(index, item){
        html += ''+ item +'';
    });
    html += '';
    return html;
}

const data_staff = $('#staff-profile').html();
var string = data_staff;
var explode = string.split("ok");

function log(content) {
  window.console && console.log(content);
}

$(function(){
  var container = $('#data-pagination');

  container.pagination({
        dataSource: explode,
        pageSize: 8,
        showGoInput: true,
        showGoButton: true,
        callback: function(data, pagination) {
            // template method of yourself
            var html = simpleTemplating(data);;
            $('#staff-profile').html(html);
        }
    })
  
});
</script>

<script>
$(document).ready( function () {
    $('#bloodType_table').DataTable();
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            },"copy", "csv", "excel", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#asuransi').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#bank').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#keluarga').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#ktp').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#kontrak').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#npwp').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#penilaian-kerja').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>