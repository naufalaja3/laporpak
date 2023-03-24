<?php
require_once __DIR__ . '/vendor/autoload.php';
include('koneksi.php');
                   
$query = mysqli_query($koneksi, "SELECT * FROM masyarakat ");              

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
            LAPORAN AKUN MASYARAKAT<br>
            </span>
        </td>
    </tr>
</table>
<h1 align="center"></h1>
<table border="1" cellpadding="10" cellspacing="0" align="center">

  <tr>
    <th>No</th>
    <th>Nik</th>
    <th>Nama</th>
    <th>Username</th>
    <th>Password</th>
    <th>No Telepon</th>
  </tr>';
  
  $no = 1;
  foreach($query as $data){
    $html .='<tr>
            <td>'. $no++ .'</td>
            <td>'. $data["nik"] .'</td>
            <td>'. $data["nama"] .'</td>
            <td>'. $data["username"] .'</td>
            <td>'. $data["password"] .'</td>
            <td>'. $data["telp"] .'</td>
            </tr>';
  }  

$html .='</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>