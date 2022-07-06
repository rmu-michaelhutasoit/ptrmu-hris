<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <!-- <a href="../../index2.html" class="h1"><b>HRIS-</b>PTRMU</a> -->
      <figure><img src="<?= base_url('assets/gambar/rmu_logo_01.png') ?>" width="100px"></figure>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?= $this->session->flashdata('message') ?>
 
      <form class="user" method="post" action="<?= base_url('auth') ?>">
        <div class="input-group">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email" <?= set_value('email') ?> autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
        <div class="mb-3"></div>
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
        <div class="mb-3"></div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->