
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
                <h3 class="card-title">Daftar Golongan Darah</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="bloodType_table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Level</th>
                    <th>Singkatan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pendidikan_terakhir as $data) : ?>
                  <tr>
                    <td><?= $data->ID ?></td>
                    <td><?= $data->Last_education ?></td>
                    <td><?php if (is_null($data->Level)) {
                        echo 0;
                    }else{
                        echo $data->Level;
                    }  ?></td>
                    <td><?= $data->Singkatan ?></td>
                  </tr>
                  <?php endforeach;  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Level</th>
                    <th>Singkatan</th>
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
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->