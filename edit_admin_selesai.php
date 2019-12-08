<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"]) || $_SESSION["logged-in"]!==true)

	$nik = $_GET['nik'];
	$username = $_POST['username'];
	$password = $_POST['password'];
$sql = "update login set username='$username', password='$password' where nik='$nik';";
$mysql = mysql_query($sql);

	if($mysql){
	echo "<script>window.alert('Data Berhasil Disimpan');
window.location=('list_admin.php')
</script>";
}else{
echo "<script>window.alert('Data Gagal Diedit');
window.location=('list_admin.php') 
</script>";
}

?>