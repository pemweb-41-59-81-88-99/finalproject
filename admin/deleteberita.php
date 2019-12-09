<?php
$ambil = $koneksi->query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoevent = $pecah['Gambar'];
if(file_exists("berita/$fotoevent"))	
	{	
		unlink("berita/$fotoevent");
	}

$koneksi->query("DELETE FROM berita WHERE id_berita='$_GET[id]'");

echo "<script>alert('Data berita Terhapus'); </script>";
echo "<script>location='indexadmin.php?halaman=berita';</script>";
?>