<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)


$nik = $_POST['nik'];
$username = $_POST['username'];
$password = $_POST['password'];


$mysql =mysql_query("insert into login values ('$nik', '$username', '$password')");


	if($mysql){

		
	echo "<script>window.alert('Data Berhasil Disimpan');
window.location=('list_admin.php')
</script>";
}else{
echo "<script>window.alert('Gagal');
window.location=('tambah_data_admin.php')
</script>";
}

?>

 