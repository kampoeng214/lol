<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
// query untuk mendapatkan record dari username
$query = "SELECT * FROM login WHERE username = '$username'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
// cek kesesuaian password
if ($password == $data['password'])
{
    // menyimpan username dan level ke dalam session
    
    $_SESSION['username'] = $data['username'];
echo "<script> alert('Berhasil'); location.href='list_admin.php'</script>";
}
else 
{ echo " <script> alert('Username atau Password Salah'); location.href='login.php'</script>";  }
?>