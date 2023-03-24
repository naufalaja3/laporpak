<?php
			include('koneksi.php'); 
			
			$id_pengaduan = $_POST['id'];
			$tgl_tanggapan= $_POST['tgl_tanggapan'];
			$tanggapan = $_POST['tanggapan'];
			$id_petugas = $_POST['id_petugas'];
			
			
			$cek = mysqli_query($koneksi, "SELECT * FROM pengaduan,tanggapan WHERE tanggapan.id_pengaduan='$id_pengaduan' AND tanggapan.id_pengaduan=pengaduan.id_pengaduan") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0)
			{
	
				$sql = mysqli_query($koneksi, "INSERT INTO tanggapan VALUES('', '$id_pengaduan', '$tgl_tanggapan', '$tanggapan','$id_petugas')") or die(mysqli_error($koneksi));
				       mysqli_query($koneksi,"UPDATE pengaduan SET status='selesai' WHERE id_pengaduan=$id_pengaduan");
				if($sql)
				{
					header("Location:pengaduan_tanggapi.php?pesan=berhasil_ditanggapi");
				}
				else
				{
					header("Location:pengaduan_tanggapi.php?pesan=simpan_gagal");
					//echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
			else            
			{
				//echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
				header("Location:pengaduan_tanggapi.php?pesan=simpan_duplikat");
			}
?>