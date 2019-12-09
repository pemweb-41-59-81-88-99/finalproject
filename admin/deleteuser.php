<?php
$ambil = $koneksi->query("SELECT * FROM user WHERE ID_User='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM user WHERE ID_User='$_GET[id]'");

echo "<script>alert('Data User Terhapus'); </script>";
echo "<script>location='indexadmin.php?halaman=user';</script>";
?>