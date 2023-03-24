<?php
require_once __DIR__ . '/vendor/autoload.php';
include('koneksi.php');
$carikan=$_GET['carikan'];
$cari=$_GET['cari'];
/*
$query = mysqli_query($koneksi, "SELECT * FROM pengaduan,tanggapan WHERE tanggapan.id_pengaduan=pengaduan.id_pengaduan and pengaduan.status='$cx'");
*/
$qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan");
                     if (isset($_GET["cari"])) {
                       $cari = $_GET["cari"];
                       $carikan = $_GET["carikan"];
                       if (($cari == "semua") and ($carikan == "semua")) {
                         $qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan");
                       } elseif (($cari == "semua") and (($carikan == 0) or ($carikan == "proses") or ($carikan == "selesai"))) {
                         $qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status = '$carikan'");
                       } elseif ((($cari == "lingkungan") or ($cari == "kriminalitas") or ($cari == "jalan")) and ($carikan == "semua")) {
                         $qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE jenis_laporan = '$cari'");
                       } else {
                         $qwe = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE jenis_laporan = '$cari' AND  status = '$carikan'");
                       }
                     }
                    

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan Masyarakat</title>
</head>
<body>
<table style="border-bottom: 1px solid #999999; padding-bottom: 10px; width: 203mm;">
    <tr valign="top">
        <td style="width: 203mm;" valign="middle" align="center">
            <span style="font-weight: bold; padding-bottom: 5px; font-size: 16pt;">
            LAPORAN PENGADUAN MASYARAKAT<br>
            </span>
        </td>
    </tr>
</table>
<h1 align="center"></h1>
<table border="1" cellpadding="10" cellspacing="0" align="center">

  <tr>
    <th>No</th>
    <th>Tanggal Pengaduan</th>
    <th>NIK</th>
    <th>JUDUL LAPORAN</th>
    <th>Isi Laporan</th>
    <th>foto</th>
  </tr>';
  
  $no = 1;
  foreach($qwe as $data){
    $html .='<tr>
            <td>'. $no++ .'</td>
            <td>'. $data["tgl_pengaduan"] .'</td>
            <td>'. $data["nik"] .'</td>
            <td>'. $data["judul_laporan"] .'</td>
            <td>'. $data["isi_laporan"] .'</td>
            <td><img src="../dist/img/'. $data["foto"] .'" width="100px"></td>
            </tr>';
  }  

$html .='</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     alt="">
</body>
</html>