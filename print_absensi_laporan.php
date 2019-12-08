<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url");  // Refresh the webpage every 5 seconds
?>
<?php
           header("Content-Type: application/doc");   
           header("Content-Disposition: attachment; filename=print_absensi.doc");
		   ?>
<html> 
<head>
<style>
table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:hover{background-color:#badffb}

th {
    background-color: #0CF;
    color: white;
}
.button {
    background-color: #6e300a;
    border: none;
    border-radius: 10px;
    color: white;
    padding: 4px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block; 
    margin: 50px 500px;
    cursor: pointer;
    float: right;
}

.button1 {font-size: 15px;
}
</style>
</head>
   <h3 align="center">LAPORAN DATA KEHADIRAN DOSEN PROGRAM STUDI TEKINK INFORMATIKA </h3>
	<table width="100%" border="1" align='center'>
		<tr align='center'>
			<!--<th width="100px"><b>ID</b></th>-->
			<th width="50px"><b>RFID</b></th>
			<th width="50px"><b>NIK</b></th>
			<th width="80px"><b>FOTO</b></th>
			<th width="100px"><b>NAMA DOSEN</b></th>
			<th width="100px"><b>JABATAN</b></th>
			<th width="100px"><b>JUMLAH JAM KERJA</b></th>
	
		</tr>
<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)
  {
  	
	 //Menampilkan Hanya Kehadiran
	//$query="select * from tbkehadiran";  
	
	//Menampilkan hasil tanpa Null
	//$query="select tbkehadiran.rfid, mahasiswa.nama, mahasiswa.jurusan, tbkehadiran.id, tbkehadiran.jamdatang from mahasiswa, tbkehadiran WHERE mahasiswa.rfid=tbkehadiran.rfid";
	
	//Menampilkan hasil dengan Null apabila siswa belum ada / belum terdaftar
	if(isset($_GET['cari']) && empty($_GET['tgl_awal']) && empty($_GET['tgl_akhir'])){
		$cari = $_GET['cari'];
		$result = "SELECT
					b.rfid,
					a.nama,
					a.nik,
					a.images,
					a.jabatan,
					sec_to_time(SUM(time_to_Sec(TIMEDIFF(b.jampulang, b.jamdatang)))) as jumlah
				FROM mahasiswa a 
				INNER JOIN tbkehadiran b ON a.rfid = b.rfid 
				WHERE a.nama like '%".$cari."%'
				GROUP BY a.rfid
				ORDER BY b.id ASC";
	}
	else if (isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir']) && empty($_GET['cari'])){
		$tgl_awal = $_GET['tgl_awal'];
		$tgl_akhir = $_GET['tgl_akhir'];
		$result = "SELECT
					b.rfid,
					a.nama,
					a.nik,
					a.images,
					a.jabatan,
					sec_to_time(SUM(time_to_Sec(TIMEDIFF(b.jampulang, b.jamdatang)))) as jumlah
				FROM mahasiswa a 
				INNER JOIN tbkehadiran b ON a.rfid = b.rfid 
				WHERE b.jamdatang between '$tgl_awal' AND '$tgl_akhir'
				GROUP BY a.rfid
				ORDER BY b.id ASC";
	}
	else if (isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir']) && isset($_GET['cari'])){
		$tgl_awal = $_GET['tgl_awal'];
		$tgl_akhir = $_GET['tgl_akhir'];
		$cari = $_GET['cari'];
		$result = "SELECT
					b.rfid,
					a.nama,
					a.nik,
					a.images,
					a.jabatan,
					sec_to_time(SUM(time_to_Sec(TIMEDIFF(b.jampulang, b.jamdatang)))) as jumlah
				FROM mahasiswa a 
				INNER JOIN tbkehadiran b ON a.rfid = b.rfid 
				WHERE a.nama like '%".$cari."%' AND b.jamdatang between '$tgl_awal' AND '$tgl_akhir'
				GROUP BY a.rfid
				ORDER BY b.id ASC";
	}
	$result1=mysql_query($result);
  }
?>
<?php 
		while($data=mysql_fetch_array($result1)) 
			
{ 
		echo ("<tr [align='center'>
				
				<td>".$data['rfid']."</td>
				<td>".$data['nik']."</td>
				<td>".$data['images']."</td>
				<td>".$data['nama']."</td>
				<td>".$data['jabatan']."</td>
				<td>".$data['jumlah']."</td>
			</tr>");
			
}
?>
	</table>
</html>