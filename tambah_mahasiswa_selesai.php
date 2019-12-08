<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)


$id_dosen = $_POST['id_dosen'];
$rfid = $_POST['rfid'];
$nik = $_POST['nik'];

$images = $_FILES['images']['name'];
$tmp = $_FILES['images']['tmp_name'];

$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$path="assets/img/".$images;

$cek = move_uploaded_file($tmp, $path);

$mysql = mysql_query("insert into mahasiswa values ('$id_dosen', '$rfid', '$nik', '$images', '$nama', '$jabatan', '$jenis_kelamin')");
	if($cek){
	if($mysql){
	echo "<script>window.alert('Data Berhasil Disimpan');
window.location=('list_mahasiswa.php')
</script>";
}	
}else{
echo "<script>window.alert('Gagal');
window.location=('list_mahasiswa.php')
</script>";
}

?>

 