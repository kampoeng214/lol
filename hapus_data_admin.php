<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)
$nik = $_GET['nik'];
mysql_query("delete from login where nik='$nik'") or die("Gagal Menghapus Data Admin.");
mysql_close($koneksi);

echo "<script>window.alert('Berhasil Menghapus Data Admin');
window.location=('list_admin.php')
</script>";

?>