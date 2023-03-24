<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location:login.php");
}
$username = $_SESSION["username"];
$nama = $_SESSION["nama_petugas"];
$level = $_SESSION["level"];
if (isset($_GET['pesan'])) {
  $pesan = $_GET['pesan'];
} else {
  $pesan = "";
}

//memasukkan file config.php
if ($level == 'petugas') {
  header("Location:beranda.php");
}
include('koneksi.php');

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Info.in | Petugas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="beranda.php" class="nav-link">Beranda</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user-circle"></i> Profil
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              Saat ini Anda bertindak sebagai <b><?php echo $nama; ?></b>
            </a>
            <a href="logout.php" class="dropdown-item dropdown-footer"><button type="button" class="btn btn-block bg-gradient-danger"><i class="far fa-user-circle"></i> Logout</button></a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../dist/img/pengaduan.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Info.in</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $nama; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="beranda.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="pengaduan_masuk.php" class="nav-link ">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Pengaduan Masuk
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="pengaduan_tanggapi.php" class="nav-link">
                <i class="nav-icon fas fa-check"></i>
                <p>
                  Selesai
                </p>
              </a>
            </li>
            <?php
            if ($level == 'admin') {
            ?>
              <li class="nav-item has-treeview">
                <a href="data_petugas.php" class="nav-link active">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Data Petugas
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="data_masyarakat.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Masyarakat
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="laporan.php?cari=semua&carikan=semua" class="nav-link">
                  <i class="nav-icon fas fa-print"></i>
                  <p>
                    Generate Laporan
                  </p>
                </a>
              </li>
            <?php } ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0 text-dark">Pengaduan</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- Small boxes (Stat box) -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  <i class="far fa-plus-square"></i> Tambahkan Petugas
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Petugas</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>No Telepon</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM petugas");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_petugas']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['password']; ?></td>
                        <td><?php echo $data['telp']; ?> </td>
                        <td><?php echo $data['level']; ?> </td>
                        <td>
                          <a href="#" type="button" class="badge badge-warning" data-toggle="modal" data-target="#modal-edit<?php echo $data['id_petugas']; ?>" title="Edit Data"><i class="far fa-edit"></i></a>
                          <a href="hapus_petugas.php?id_petugas=<?php echo $data['id_petugas']; ?>" class="badge badge-danger" title="Hapus" onclick="return <?php echo 'confirm(\'Yakin ingin menghapus data ini?\');' ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>

                      <div class="modal fade" id="modal-edit<?php echo $data['id_petugas']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Perbarui Data Petugas</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="edit_petugas.php" method="post" id="quickForm">
                              <div class="modal-body">
                                <?php
                                $id_petugas = $data['id_petugas'];
                                $query_edit = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'");
                                while ($row = mysqli_fetch_array($query_edit)) {
                                ?>
                                  <div class="form-group">
                                    <label>Nama Petugas</label>
                                    <input type="text" class="form-control" hidden="hidden" name="id_petugas" value="<?php echo $row['id_petugas']; ?>">
                                    <input type="text" class="form-control" name="nama_petugas" value="<?php echo $row['nama_petugas']; ?>" placeholder="Masukan Nama">
                                  </div>
                                  <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" placeholder="Masukan username">
                                  </div>
                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>" placeholder="Masukan Password">
                                  </div>
                                  <div class="form-group">
                                    <label>No telepon</label>
                                    <input type="text" class="form-control" name="no_telp" value="<?php echo $row['telp']; ?>" placeholder="Masukan telepon">
                                  </div>
                                  <div class="form-group">
                                    <label>Level</label>
                                    <input type="text" class="form-control" name="level" value="<?php echo $row['level']; ?>" placeholder="Masukan telepon">
                                  </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" name="submit" class="btn btn-primary">Perbarui</button>
                              </div>
                            <?php
                                }
                            ?>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Tambah Petugas</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="tambah_petugas.php" method="post" id="quickForm" enctype="multipart/form-data">
                              <div class="modal-body">

                                <div class="form-group">
                                  <label>Nama Petugas</label>
                                  <input type="text" class="form-control" name="nama_petugas" placeholder="Masukan Nama" required="required">
                                </div>
                                <div class="form-group">
                                  <label>Username</label>
                                  <input type="text" class="form-control" name="username" placeholder="Masukan Username" required="required">
                                </div>
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" class="form-control" name="password" placeholder="Masukan Password " required="required">
                                </div>
                                <div class="form-group">
                                  <label>No telepon</label>
                                  <input type="number" class="form-control" name="telp" placeholder="masukan no telepon" required="required">
                                </div>
                                <div class="form-group">
                                  <label>Level</label>
                                  <select class="form-control" name="level">
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                  </select>
                                  <!-- <input type="text" class="form-control" name="level" placeholder="Masukan level " required="required"> -->
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

                    <?php
                    }
                    ?>
                    </form>
              </div>
            </div>
          </div>
          </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="https://www.instagram.com/naufalamm_/">Naufal Akbar M</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
  <!-- jquery-validation -->
  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
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

  <script type="text/javascript">
    $(document).ready(function() {
      $('#quickForm').validate({
        rules: {
          nama: {
            required: true,
          },
          alamat: {
            required: true,
          },
          tlp: {
            required: true,
            number: true,
          },
        },
        messages: {
          nama: {
            required: "Silahkan Masukan Nama Outlet"
          },
          alamat: {
            required: "Silahkan Masukan Alamat yang Sesuai"
          },
          tlp: {
            required: "Silahkan Masukan Nomor Telepon Outlet"
          },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>

  <?php
  //ambil nilai variabel error
  if ($pesan == "simpan_berhasil") {
  ?>
    <script type="text/javascript">
      toastr.success('Berhasil menambahkan data.')
    </script>
  <?php
  }

  if ($pesan == "simpan_gagal") {
  ?>
    <script type="text/javascript">
      toastr.error('Gagal menambahkan data.')
    </script>
  <?php
  }

  if ($pesan == "simpan_duplikat") {
  ?>
    <script type="text/javascript">
      toastr.error('Data sudah ada.')
    </script>
  <?php
  }

  if ($pesan == "hapus_berhasil") {
  ?>
    <script type="text/javascript">
      toastr.error('Berhasil menghapus data.')
    </script>
  <?php
  }

  if ($pesan == "hapus_gagal") {
  ?>
    <script type="text/javascript">
      toastr.error('Gagal menghapus data.')
    </script>
  <?php
  }

  if ($pesan == "edit_berhasil") {
  ?>
    <script type="text/javascript">
      toastr.warning('Berhasil memperbarui data.')
    </script>
  <?php
  }

  if ($pesan == "edit_gagal") {
  ?>
    <script type="text/javascript">
      toastr.error('Gagal memperbarui data.')
    </script>
  <?php
  }
  ?>

</body>

</html>