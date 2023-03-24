<?php
			include('koneksi.php'); 
			
			$nama_petugas = $_POST['nama_petugas'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$telp = $_POST['telp'];
			$level = $_POST['level'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0)
			{
	
				$sql = mysqli_query($koneksi, "INSERT INTO petugas VALUES('', '$nama_petugas', '$username', '$password','$telp','$level')") or die(mysqli_error($koneksi));
				
				if($sql)
				{
					header("Location:data_petugas.php?pesan=simpan_berhasil");
				}
				else
				{
					header("Location:data_petugas.php?pesan=simpan_gagal");
					//echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
			else            
			{
				//echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
				header("Location:data_petugas.php?pesan=simpan_duplikat");
			}
?>