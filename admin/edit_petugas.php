<?php
		include('koneksi.php');
			$id_petugas = $_POST['id_petugas'];
			$nama_petugas = $_POST['nama_petugas'];
			$username = $_POST['username'];
			$password	= $_POST['password'];
			$telp	= $_POST['no_telp'];
			$level	= $_POST['level'];
			
			
			$sql = mysqli_query($koneksi, "UPDATE petugas SET id_petugas='$id_petugas', nama_petugas='$nama_petugas', username='$username',password='$password', telp='$telp',level='$level' WHERE id_petugas='$id_petugas'") or die(mysqli_error($koneksi));
			
			if($sql)
			{
				header("Location:data_petugas.php?pesan=edit_berhasil");
			}
			else
			{
				header("Location:data_petugas.php?pesan=edit_berhasil");
			}
?>