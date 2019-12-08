<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)
$id_dosen = $_GET['id_dosen'];
mysql_query("delete from mahasiswa where id_dosen='$id_dosen'") or die("Gagal Menghapus Data Dosen.");
mysql_close($koneksi);

echo "<script>window.alert('Berhasil Menghapus Data Dosen');
window.location=('list_mahasiswa.php')
</script>";

?>