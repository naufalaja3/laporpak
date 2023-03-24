<?php
include('koneksi.php');

if(isset($_POST["proses"])){ 
    $id_pengaduan=$_POST['id'];
    $tgl_tanggapan=  date('Y-m-d');
	$id_petugas = $_POST['id_petugas'];
    
    $qwe=mysqli_query($koneksi,"UPDATE pengaduan SET status='proses' WHERE id_pengaduan=$id_pengaduan ");
    if($qwe){
        header("Location:pengaduan_masuk.php");
        exit;
    }
}

?>