<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Info.in | Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><span class="fas fa-paper"></span><b> Registrasi</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Isi Data Diri Anda</p>

      <form action="" method="POST" autocomplete="off">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nik" placeholder="nik" autofocus required minlength="2" maxlength="16"> 
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama" placeholder="nama" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="konfir" placeholder="Konfirmasi Password" id="konfir" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="tel" class="form-control" name="telp" placeholder="telp" maxlength="13" pattern="(\+62|62|0)8[1-9][0-9]{6,9}$" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        
        <div class="row">
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12">
            <br><button type="submit" name="submit" class="btn btn-primary btn-block" >Daftar</button><br>
          </div>
          <!-- /.col -->
        </div>
        <a href="login.php" class="btn btn-danger btn-block">Sudah Punya Akun?? Login Disini</a>
        
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfir = $_POST['konfir'];
    $telp = $_POST['telp'];
    
if(strlen($nik)!=16){
  echo
  "<script>
        alert('Nik memerlukan 16 digit');
        document.location.href='registrasi.php';
  </script>";
}elseif($password !== $konfir){
  echo
  "<script>
        alert('Konfirmasi Password tidak sama');
        document.location.href='registrasi.php';
  </script>";
}else{
    $cek = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE nik='$nik'");
    if(mysqli_num_rows($cek)==0){
      mysqli_query($koneksi, "INSERT INTO masyarakat VALUES('$nik','$nama','$username','$password','$telp')");
      if (mysqli_affected_rows($koneksi)>0 ) {
      echo
      "<script>
        alert('Registrasi berhasil!!');
        document.location.href='login.php';
      </script>";
    }else{
      echo
      "<script>
      alert('Nik yang anda gunakan sudah terdaftar!!');
      document.location.href='registrasi.php';
      </script>";
        }
}
}
}
?>
</body>
</html>