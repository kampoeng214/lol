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
			<th width="100px"><b>JENIS KELAMIN</b></th>
			<th width="100px"><b>JABATAN</b></th>
		    <th width="100px"><b>JAM DATANG</b></th>
			<th width="100px"><b>JAM PULANG</b></th>
			<th width="50px"><b>JUMLAH</b></th>
	
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
	$cari = $_GET['cari'];
	$query="SELECT
					b.rfid,
					a.nama,
					a.nik,
					a.images,
					a.jenis_kelamin,
					a.jabatan,
					b.id,
					b.jamdatang,
					b.jampulang,
					DATE_FORMAT(
						b.jamdatang,'%H: % i: % s ') waktu_datang, 
					DATE_FORMAT(b.jampulang,' % H: % i: % s ') waktu_pulang,
					TIMEDIFF(b.jampulang, b.jamdatang) as jumlah 
				FROM mahasiswa a 
				INNER JOIN tbkehadiran b ON a.rfid = b.rfid 
				WHERE a.nama like '%".$cari."%'
				ORDER BY b.id ASC ";	
	   
	$result=mysql_query($query);
	
  }
?>
<?php 
		while($data=mysql_fetch_array($result)) 
			
{ 
		echo ("<tr [align='center'>
				
				<td>".$data['rfid']."</td>
				<td>".$data['nik']."</td>
				<td>".$data['images']."</td>
				<td>".$data['nama']."</td>
				<td>".$data['jenis_kelamin']."</td>
				<td>".$data['jabatan']."</td>
				<td>".$data['jamdatang']."</td>
				<td>".$data['jampulang']."</td>
				<td>".$data['jumlah']."</td>
			</tr>");
			
}
?>
	</table>
	
</html>