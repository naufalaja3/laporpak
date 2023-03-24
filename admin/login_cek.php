<?php
session_start();
include "koneksi.php";

$username = $_POST["username"];
$password = ($_POST["password"]);

$sql = "select * from petugas where username='".$username."' and password='".$password."' limit 1";
$hasil = mysqli_query ($koneksi,$sql);
$jumlah = mysqli_num_rows($hasil);

	if ($jumlah>0) 
	{
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["username"]=$row["username"];
		$_SESSION["nama_petugas"]=$row["nama_petugas"];
		$_SESSION["level"]=$row["level"];
		$_SESSION["id_petugas"]=$row["id_petugas"];
		header("Location:beranda.php?pesan=suskes");
	}
	else 
	{
		header("Location:login.php?pesan=kesalahan");
	}
?>
