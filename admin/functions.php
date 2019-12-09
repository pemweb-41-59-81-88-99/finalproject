<?php 
include "koneksi.php";


function registrasi($data)  {
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi , $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi ,$data["password2"]);

    if ($password !== $password2){
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
        </script>";
        return false;
    } 
    
    //cek username apakah udah ada
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username sudah terdaftar!')
        </script>";
        return false;
    }
    
    // enkripsi pass
    $password = password_hash($password, PASSWORD_DEFAULT);

    // nambah username ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($koneksi);
}



?>