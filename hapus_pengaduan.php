<?php
	//include file config.php
	include('koneksi.php');

	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id_pengaduan = $_GET['id_pengaduan'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0)
	{
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'") or die(mysqli_error($koneksi));
		if($del)
		{
			header("Location:pengaduan.php?pesan=hapus_berhasil");
		}
		else
		{
			header("Location:pengaduan.php?pesan=hapus_gagal");
		}
	}
	else
	{
		header("Location:pengaduan.php?pesan=hapus_duplikat");
	}
?>