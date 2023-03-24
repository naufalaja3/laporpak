<?php
			include('koneksi.php'); 
			
			$tanggal_pengaduan = $_POST['tgl_pengaduan'];
			$nik = $_POST['nik'];
			$jenis_laporan = $_POST['jenis_laporan'];
			$judul_laporan = $_POST['judul_laporan'];
			$isi_laporan = $_POST['isi_laporan'];
			$foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
            $status = 0;
			
			$cek = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0)
			{
				move_uploaded_file($tmp, "dist/img/" . $foto);
				$sql = mysqli_query($koneksi, "INSERT INTO pengaduan VALUES('', '$tanggal_pengaduan', '$nik','$jenis_laporan','$judul_laporan','$isi_laporan','$foto','$status')") or die(mysqli_error($koneksi));
				
				if($sql)
				{
					header("Location:pengaduan.php?pesan=simpan_berhasil");
				}
				else
				{
					header("Location:pengaduan.php?pesan=simpan_gagal");
					//echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
			else            
			{
				//echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
				header("Location:pengaduan.php?pesan=simpan_duplikat");
			}
?>