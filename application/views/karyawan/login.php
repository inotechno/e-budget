<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" type="image/gif">
  <title>E-budget | Login Karyawan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><font color="green" size="100" class="font-weight-bolder"><b>e</font>-<font color="orange" class="text-monospace">Budget</b></font></a>
    <!-- <img src="<?= base_url('assets/dist/img/pt.png');?>" class="brand-image elevation-3"> -->
  </div>
  <!-- /.login-logo -->
  <div class="card elevation-5">
    <div class="card-body login-card-body elevation-3">
      <center><img src="<?= base_url('assets/dist/img/pt.png');?>" class="brand-image mb-4" width="180"></center>
      <!-- <p class="login-box-msg">Login Untuk Karyawan</p> -->

      <form id="form-login" method="post">
        <div class="input-group mb-3 elevation-1">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user elevation-3"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 elevation-1">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock elevation-3"></span>
            </div>
          </div>
        </div>
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
            <button type="submit" class="btn btn-primary btn-block elevation-3">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1 mt-2 text-right">
        <!-- <a href="forgot-password.html">Lupa Password ?</a> -->
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>

<script type="text/javascript">
  $(function() {
    
    $('#form-login').submit(function() {
      var username = $('[name="username"]').val().trim();
      var password = $('[name="password"]').val().trim();
      $.ajax({
        url: '<?= base_url('login/ceklogin') ?>',
        type: 'POST',
        dataType:'json',
        data: {username:username, password:password},
        success:function(response) {
          if (response.status == 'sukses') {

            toastr.success(response.message)
            setTimeout(function(){ 
              window.location.href = response.redirect;
            }, 1500);
          }else{
            toastr.error(response.message)
          }
        }
      });
     return false; 
      
    });
  });
</script>
</body>
</html>
