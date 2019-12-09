<?php
$ambil = $koneksi->query("SELECT * FROM daftar_aduan WHERE id_daftaraduan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM daftar_aduan WHERE id_daftaraduan='$_GET[id]'");

echo "<script>alert('Data Program Terhapus'); </script>";
echo "<script>location='indexadmin.php?halaman=daftaraduan';</script>";
?>