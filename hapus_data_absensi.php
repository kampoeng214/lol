<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)
$id = $_GET['id'];
mysql_query("delete from tbkehadiran where id='$id'") or die("Gagal Menghapus Data Absensi.");
mysql_query("delete from tbkehadiranpulang where id='$id'") or die("Gagal Menghapus Data Absensi.");
mysql_close($koneksi);

echo "<script>window.alert('Berhasil Menghapus Data Absensi');
window.location=('list_absensi.php')
</script>";

?>