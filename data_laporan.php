<?php
// $url=$_SERVER['REQUEST_URI'];
// header("Refresh: 5; URL=$url");  // Refresh the webpage every 5 seconds
include 'koneksi.php';
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
<form action="list_laporan.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	
	<label style = "margin-left:20px">Tanggal Awal :</label>
	<input type="date" name="tgl_awal" format="yyyy-mm-dd">
	
	<label style = "margin-left:20px">Tanggal Akhir :</label>
	<input type="date" name="tgl_akhir" format="yyyy-mm-dd">
	
	<input type="submit" style = "margin-left:20px" value="Cari">
</form>
<br>
<?php 
	if(isset($_GET['cari']) && empty($_GET['tgl_awal']) && empty($_GET['tgl_akhir'])){
		$cari = $_GET['cari'];
		echo "<b>Hasil pencarian dengan nama: ".$cari."</b>";
	}
	elseif(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir']) && empty($_GET['cari'])){
		$tgl_awal = $_GET['tgl_awal'];
		$tgl_akhir = $_GET['tgl_akhir'];
		echo "<b>Hasil pencarian dimulai tanggal: ".$tgl_awal." dan berakhir pada tanggal: ".$tgl_akhir."</b>";
	}
	elseif(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir']) && isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$tgl_awal = $_GET['tgl_awal'];
		$tgl_akhir = $_GET['tgl_akhir'];
		echo "<b>Hasil pencarian dengan nama: ".$cari. " dimulai tanggal: ".$tgl_awal." dan berakhir pada tanggal: ".$tgl_akhir."</b>";
	}
	echo "<br><br>";
?>

<table width="100%" border="1" align='center'>
		<tr align='center'>
			<!--<th width="100px"><b>ID</b></th>-->
			<th width="50px"><b>RFID</b></th>
			<th width="50px"><b>NIK</b></th>
			<th width="80px"><b>FOTO </b></th>
			<th width="100px"><b>NAMA </b></th>
			<th width="100px"><b>JABATAN</b></th>
			<th width="100px"><b>JUMLAH JAM KERJA</b></th>
		</tr>
<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("dbcarousel");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)
  {
	if(isset($_GET['cari']) && empty($_GET['tgl_awal']) && empty($_GET['tgl_akhir'])){
		$cari = $_GET['cari'];
		$sql = "SELECT
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
	elseif(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir']) && empty($_GET['cari'])){
		$tgl_awal = $_GET['tgl_awal'];
		$tgl_akhir = $_GET['tgl_akhir'];
		$sql = "SELECT
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
	elseif(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir']) && isset($_GET['cari'])){
		$tgl_awal = $_GET['tgl_awal'];
		$tgl_akhir = $_GET['tgl_akhir'];
		$sql = "SELECT
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
	else{
		$sql = "SELECT
					b.rfid,
					a.nama,
					a.nik,
					a.images,
					a.jabatan,
					sec_to_time(SUM(time_to_Sec(TIMEDIFF(b.jampulang, b.jamdatang)))) as jumlah
				FROM mahasiswa a 
				INNER JOIN tbkehadiran b ON a.rfid = b.rfid 
				GROUP BY a.rfid
				ORDER BY b.id ASC";		
	}
		$data1 = mysql_query($sql);				
	$no = 1;
	while($data = mysql_fetch_array($data1)){
		

 
		echo ("<tr [align='center'>

				
				<td>".$data['rfid']."</td>
				<td>".$data['nik']."</td>
				<td>".$data['images']."</td>
				<td>".$data['nama']."</td>
				<td>".$data['jabatan']."</td>
				<td>".$data['jumlah']."</td>
			</tr>");
  }} ?>
	</table>
	<?php 
	$cari=$_GET['cari'];
	$tgl_awal=$_GET['tgl_awal'];
	$tgl_akhir=$_GET['tgl_akhir'];
	?>
	<h3><center><a href="print_absensi_laporan.php?cari=<?php echo $cari;?>&tgl_awal=<?php echo$tgl_awal?>&tgl_akhir=<?php echo$tgl_akhir?>" target="_blank">PRINT TIPE .DOC</a></center></h3>
	<h3><center><a href="print_absensi_laporanpdf.php?cari=<?php echo $cari;?>&tgl_awal=<?php echo$tgl_awal?>&tgl_akhir=<?php echo$tgl_akhir?>" target="_blank">PRINT TIPE .PDF</a></center></h3>
	
	</html>