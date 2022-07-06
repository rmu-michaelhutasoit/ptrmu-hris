$(function () { 

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  var areaChartData = {
    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label               : 'Digital Goods',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius         : false,
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
    ],
    datasets: [
      {
        data: [700,500,400,600,300,100],
        backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
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


  //-------------
  //- BAR CHART -
  //-------------
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

  //---------------------
  //- STACKED BAR CHART -
  //---------------------
  var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
  var stackedBarChartData = $.extend(true, {}, barChartData)

  var stackedBarChartOptions = {
    responsive              : true,
    maintainAspectRatio     : false,
    scales: {
      xAxes: [{
        stacked: true,
      }],
      yAxes: [{
        stacked: true
      }]
    }
  }

  new Chart(stackedBarChartCanvas, {
    type: 'bar',
    data: stackedBarChartData,
    options: stackedBarChartOptions
  })

function absen(){
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  Toast.fire({
    icon: 'success',
    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
  })
}
})


function change_access(id_menu, id_role) { 
 var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

  $.ajax({
    url: 'http://localhost/ptrmu-hris/Menu_manajemen/change_access',
    type: 'post',
    data: {
      roleID : id_role,
      menuID : id_menu
    },
    dataType: 'json',
    success: function(response){
      document.location.href = "http://localhost/ptrmu-hris/Menu_manajemen/user_access_menu/"+response.role_id;
      // if (response.message == "added") {
      //   Toast.fire({
      //     icon: 'success',
      //     title: 'Berhasil! Akses Ditambahkan'
      //   })
      // }else if(response.message == "remove"){
      //   Toast.fire({
      //     icon: 'success',
      //     title: 'Berhasil! Akses Dihapus'
      //   })
      // }
        
    },
    error: function(response) {
      if (response) {
        Toast.fire({
          icon: 'error',
          title: 'Oops! Maaf Terjadi Kesalahan'
        })
      }
  }
  })

 }
  

   $(function () {
  $("#tambah_data_bank").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      if ($("#tambah_data_bank").valid()) {
          $.ajax({
              url:   "http://localhost/ptrmu-hris/Daftar_staff/tambah_data_bank",
              type: "POST",
              data: formData,
              dataType : "JSON",
              cache:false,
            contentType: false,
            processData: false,
              success:function(response){
                if (response.message == "ada") {
                  Swal.fire(
                    'Oops!',
                    'Data Sudah Ada!',
                    'error'
                  )
                  
                }else{
                  Swal.fire(
                    'Berhasil!',
                    'Data Bank Ditambahkan!',
                    'success'
                  )
                  $("#bank").load(" #bank");
                }

                  // if (response == 1) {
                  //     Swal.fire(
                  //       'Berhasil!',
                  //       'Data Bank Berhasil Ditambahkan!' +response,
                  //       'success'
                  //     )
                  //     $("#bank").load(" #bank");
                  // }else{
                  //   Swal.fire(
                  //       'Oops!',
                  //       'Terjadi Kesalahan!',
                  //       'warning'
                  //     )
                  // }
              }
          });
        }else{
     
        }
        })

    $('#tambah_data_bank').validate({  
            rules: {
             bank: {
                required: true,
              },
              nama_pemilik: {
                required: true,
              },
              nomor_rekening: {
                required: true,
              },
              dokumen_bank: {
                required: true,
              }
            },
            messages: {
             bank: {
                required: "Wajib Input Nama Bank",
              },
              nama_pemilik: {
                required: "Wajib Input Nama Pemilik",
              },
              nomor_rekening: {
                required: "Wajib Input Nomor Rekening",
              },
              dokumen_bank: {
                required: "Wajib Input Dokumen Bank",
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

$(function () {
  $("#input_kehadiran").submit(function (e){
       e.preventDefault();
      var formData = new FormData(this);
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      if ($("#input_kehadiran").valid()) {
          $.ajax({
              url: "http://localhost/ptrmu-hris/Absensi/input_kehadiran",
              type: "POST",
              data: formData,
              dataType: "JSON", 
              cache:false,
              contentType: false,
              processData: false,
              success: function(response){
                  if (response.message == "success") {
                    Swal.fire(
                        'Berhasil!',
                        'Kehadiran anda berhasil di input!',
                        'success'
                      )
                  }else if(response.message == "salah method"){
                    Swal.fire(
                      'Gagal!',
                      'Kesalahan Pada Metode Pengiriman!',
                      'error'
                    )
                  }
              },
              error:function(){
                Swal.fire(
                  'Gagal!',
                  'Kesalahan Pada Metode Pengiriman!',
                  'error'
                )
              }
          });
        }else{
     
        }
        })

    $('#input_kehadiran').validate({  
            rules: {
              lokasi_hadir: {
                required: true,
              },
              kehadiran: {
                required: true,
              },
            },
            messages: {
             lokasi_hadir: {
                required: "Lokasi tidak boleh kosong",
              },
              kehadiran: {
                required: "Kehadiran tidak boleh kosong",
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



 





  