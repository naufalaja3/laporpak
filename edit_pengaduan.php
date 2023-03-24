<?php
		include('koneksi.php');
			$id_pengaduan = $_POST['id_pengaduan'];
			$tgl_pengaduan = $_POST['tgl_pengaduan'];
			$nik	= $_POST['nik'];
			$judul_laporan	= $_POST['judul_laporan'];
			$isi_laporan	= $_POST['isi_laporan'];
			$jenis_laporan = $_POST['jenis_laporan'];
			$status	= $_POST['status'];
			
			
			$sql = mysqli_query($koneksi, "UPDATE pengaduan SET id_pengaduan='$id_pengaduan', tgl_pengaduan='$tgl_pengaduan', nik='$nik',judul_laporan='$judul_laporan', isi_laporan='$isi_laporan',jenis_laporan='$jenis_laporan' WHERE id_pengaduan='$id_pengaduan'") or die(mysqli_error($koneksi));
			
			if($sql)
			{
				header("Location:pengaduan.php?pesan=edit_berhasil");
			}
			else
			{
				header("Location:pengaduan.php?pesan=edit_berhasil");
			}
?>