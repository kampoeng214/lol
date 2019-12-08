<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"]) || $_SESSION["logged-in"]!==true)

	$id_dosen = $_GET['id_dosen'];
	$rfid = $_POST['rfid'];
	$nik = $_POST['nik'];
	$images = $_POST['images'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
		
$sql = "update mahasiswa set rfid='$rfid', nik='$nik', images='$images', nama='$nama', jabatan='$jabatan', jenis_kelamin='$jenis_kelamin' where id_dosen='$id_dosen';";
$mysql = mysql_query($sql);

	if($mysql){
	echo "<script>window.alert('Data Berhasil Disimpan');
window.location=('list_mahasiswa.php')
</script>";
}else{
echo "<script>window.alert('Data Gagal Diedit');
window.location=('list_mahasiswa.php') 
</script>";
}

?>