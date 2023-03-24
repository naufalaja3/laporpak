<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location:login.php");
}
$username = $_SESSION["username"];
$nama = $_SESSION["nama"];
$nika = $_SESSION["nika"];


if (isset($_GET['pesan'])) {
  $pesan = $_GET['pesan'];
} else {
  $pesan = "";
}

//memasukkan file config.php
include('koneksi.php');

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LaporPakk | Pengaduan</title>
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
        <img src="dist/img/pengaduan.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LaporPakk!</span>
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
              <a href="outlet.php" class="nav-link active">
                <i class="nav-icon fas fa-pen"></i>
                <p>
                  Pengaduan
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="balasan.php" class="nav-link">
                <i class="nav-icon fas fa-check-square"></i>
                <p>
                  Tanggapan
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="tentang.php" class="nav-link">
                <i class="nav-icon fas fa-star"></i>
                <p>
                User Guide
                </p>
              </a>
            </li>
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

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Buat Pengaduan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="pengaduan_simpan.php" method="post" id="quickForm" enctype="multipart/form-data">
              <div class="modal-body">

                <div class="form-group">
                  <label>Tanggal Pengaduan</label>
                  <input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" name="tgl_pengaduan" placeholder="Masukan Tanggal" readonly>
                </div>
                <div class="form-group">
                  <label>nik</label>
                  <input type="number" class="form-control" name="nik" value="<?= $nika ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Jenis Laporan</label>
                  <select name="jenis_laporan" required>
                    <option value="lingkungan">lingkungan</option>
                    <option value="kriminalitas">kriminalitas</option>
                    <option value="jalan">jalan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Judul Laporan</label>
                  <input type="text" class="form-control" name="judul_laporan" placeholder="Masukan Laporan "  required>
                </div>
                <div class="form-group">
                  <label>Isi Laporan</label>
                  <textarea class="form-control" name="isi_laporan" placeholder="Masukan Laporan Anda" required></textarea>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control-file" name="foto" required>
                </div>
                
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

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- Small boxes (Stat box) -->
          <div class="col-12">
            <div class="card">
              <div class="card-body row">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  <i class="far fa-plus-square"></i> Buat Pengaduan
                </button>
                <form class="input-group col-8" action="" method="get">
                    <div class="col-12 col-md-4 col-lg-4">
                      <select class="form-control form-control-sm" name="cari">
                        <option value="semua">Cari Berdasarkan</option>
                        <option value="lingkungan">Lingkungan</option>
                        <option value="kriminalitas">Krimilitas</option>
                        <option value="jalan">Jalan</option>
                      </select>
                    </div>
                    <div>
                      <select class="form-control form-control-sm" name="carikan">
                        <option value="semua">Status</option>
                        <option value="0">Menunggu</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                      </select>
                    </div>
                    <div>
                      <button type="submit" class="input-group-text border-0">
                        <i class="fas fa-stair">Cari</i>
                      </button>
                    </div>
                  </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Pengaduan</th>
                      <th>NIK</th>
                      <th>Jenis</th>
                      <th>JUDUL LAPORAN</th>
                      <th>Isi Laporan</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                     $qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik='$nika'");
                     if (isset($_GET["cari"])) {
                       $cari = $_GET["cari"];
                       $carikan = $_GET["carikan"];
                       if (($cari == "semua") and ($carikan == "semua")) {
                         $qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik='$nika'");
                       } elseif (($cari == "semua") and (($carikan == 0) or ($carikan == "proses") or ($carikan == "selesai"))) {
                         $qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status = '$carikan'");
                       } elseif ((($cari == "lingkungan") or ($cari == "kriminalitas") or ($cari == "jalan")) and ($carikan == "semua")) {
                         $qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE jenis_laporan = '$cari'");
                       } else {
                         $qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE jenis_laporan = '$cari' AND  status = '$carikan'");
                       }
                     }
                    
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($qwe)) {
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['tgl_pengaduan']; ?></td>
                        <td><?php echo $nika ?></td>
                        <td><?php echo $data['jenis_laporan']; ?> </td>
                        <td><?php echo $data['judul_laporan']; ?></td>
                        <td><?php echo $data['isi_laporan']; ?> </td>
                        <td><img src="dist/img/<?= $data['foto']; ?>" alt="foto gagal dimuat" width="100px" readonly></td>
                        <td>
                        <?php
                          if ($data['status'] == 'proses') {
                            echo "<span class='badge bg-warning'>proses</span>";
                          } elseif ($data['status'] == 'selesai') {
                            echo "<span class='badge bg-success'>selesai</span>";
                          }elseif($data['status'] == '0') {
                            echo "<span class='badge bg-danger'>menunggu </span>";
                          }else{
                            echo "<span class='badge bg-danger'>ditolak </span>";
                          }
                          ?>
                        </td>
                        <td>
                        <?php
                          if($data['status'] == '0'){?>
                            <a href="#" type="button" class="badge badge-primary" data-toggle="modal" data-target="#modal-detail<?php echo $data['id_pengaduan']; ?>" title="Detail"><i class="far fa-eye"></i></a>
                            <a href="#" type="button" class="badge badge-warning" data-toggle="modal" data-target="#modal-edit<?php echo $data['id_pengaduan']; ?>" title="Edit"><i class="far fa-edit"></i></a>
                            <a href="hapus_pengaduan.php?id_pengaduan=<?php echo $data['id_pengaduan']; ?>" class="badge badge-danger" title="Hapus" onclick="return <?php echo 'confirm(\'Yakin ingin menghapus data ini?\');' ?>"><i class="far fa-trash-alt"></i></a>
                          <?php }else{?> 
                            <a href="#" type="button" class="badge badge-primary" data-toggle="modal" data-target="#modal-detail<?php echo $data['id_pengaduan']; ?>" title="Detail"><i class="far fa-eye"></i></a>
                          <?php } ?>        
                        </td>
                      </tr>

                      <div class="modal fade" id="modal-edit<?php echo $data['id_pengaduan']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Perbarui Data Pengaduan</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="edit_pengaduan.php" method="post" id="quickForm">
                              <div class="modal-body">
                                <?php
                                $id_pengaduan = $data['id_pengaduan'];
                                $query_edit = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
                                while ($row = mysqli_fetch_array($query_edit)) {
                                ?>
                                  <div class="form-group">
                                    <label>Tanggal Pengaduan</label>
                                    <input type="text" class="form-control" hidden="hidden" name="id_pengaduan" value="<?php echo $row['id_pengaduan']; ?>">
                                    <input type="text" class="form-control" name="tgl_pengaduan" value="<?php echo date('Y-m-d'); ?>" placeholder="Masukan Tanggal" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label>Jenis Laporan</label>
                                    <select name="jenis_laporan" value="<?php echo $row['jenis_laporan']; ?>">
                                    <?php
                                    if($row['jenis_laporan'] == 'lingkungan'){?>
                                      <option value="lingkungan" selected>lingkungan</option>
                                      <option value="kriminalitas">kriminalitas</option>
                                      <option value="jalan">jalan</option>
                                    <?php }elseif($row['jenis_laporan'] == 'kriminalitas'){?>
                                      <option value="lingkungan" >lingkungan</option>
                                      <option value="kriminalitas"selected>kriminalitas</option>
                                      <option value="jalan">jalan</option>
                                    <?php }else{?>
                                      <option value="lingkungan" >lingkungan</option>
                                      <option value="kriminalitas">kriminalitas</option>
                                      <option value="jalan"selected>jalan</option>
                                   <?php } ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Judul_laporan</label>
                                    <input type="text" class="form-control" hidden="hidden" name="nik" value="<?php echo $row['nik']; ?>">
                                    <input type="text" class="form-control" name="judul_laporan" value="<?php echo $row['judul_laporan']; ?>" placeholder="Masukan Judul">
                                  </div>
                                  <div class="form-group">
                                    <label>Isi Laporan</label>
                                    <input type="text" class="form-control" name="isi_laporan" value="<?php echo $row['isi_laporan']; ?>" placeholder="Masukan Laporan">
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

                      <div class="modal fade" id="modal-detail<?php echo $data['id_pengaduan']; ?>">
                        <?php
                        $id = $data['id_pengaduan'];
                        $query_detail = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
                        while ($row = mysqli_fetch_array($query_detail)) {
                        ?>
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Detail Data <?php echo $row['id_pengaduan']; ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form id="quickForm">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Tanggal_Pengaduan</label>
                                    <input type="text" class="form-control" hidden="hidden" name="id_pengaduan" value="<?php echo $row['id_pengaduan']; ?>" placeholder="Masukan Nama Oulet" required>
                                    <input type="text" class="form-control" disabled="disabled" name="tgl_pengaduan" value="<?php echo $row['tgl_pengaduan']; ?>" placeholder="Masukan Nama Oulet" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Judul Laporan</label>
                                    <input type="text" class="form-control" hidden="hidden" name="nik" value="<?php echo $row['nik']; ?>" required>
                                    <input type="text" class="form-control" disabled="disabled" name="nik" value="<?php echo $row['judul_laporan']; ?>" placeholder="Masukan Judul Laporan Anda" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Jenis Laporan</label>
                                    <input type="text" class="form-control" disabled="disabled" name="jenis_laporan" value="<?php echo $row['jenis_laporan']; ?>" placeholder="" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Isi Laporan</label>
                                    <input type="text" class="form-control" disabled="disabled" name="isi_laporan" value="<?php echo $row['isi_laporan']; ?>" placeholder="Masukan Nomor Telepon" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Foto</label>
                                    <input type="text" class="form-control" disabled="disabled" name="foto" value="<?php echo $row['foto']; ?>" placeholder="Masukan Nomor Telepon" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" disabled="disabled" name="status" value="<?php echo $row['status']; ?>" placeholder="" required>
                                  </div>
                                  
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                  <!--<button type="submit" class="btn btn-primary">Perbarui</button>-->
                                </div>
                              <?php
                            }
                              ?>
                              </form>
                            </div>
                          </div>
                      </div>

                    <?php
                    }
                    ?>
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
  <!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script> -->
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