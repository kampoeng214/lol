<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url");  // Refresh the webpage every 5 seconds
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
<form action="list_absensi.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
		
	<input type="submit" style = "margin-left:20px" value="Cari">
</form>

<?php
	// $mulai="14:00:00";
	// $selesai="14:01:60";
	// list($jam, $menit, $detik)=explode('.',$mulai);
	// $buatWaktuMulai=mktime($jam, $menit, $detik,1,1,1);
	
	// list($jam, $menit, $detik)=explode(':',$selesai);
	// $buatWaktuSelesai=mktime($jam, $menit, $detik,1,1,1);
	// $selisihDetik=$buatWaktuSelesai-$buatWaktuMulai;
		// echo"Mulai : $selesai";
		// echo"Waktu $selisihDetik detik";
		
?>

<?php 
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		echo "<b>Hasil pencarian dengan nama: ".$cari."</b>";
	}
?>

	<table width="100%" border="1" align='center'>
		<tr align='center'>
			<!--<th width="100px"><b>ID</b></th>-->
			<th width="50px"><b>RFID</b></th>
			<th width="50px"><b>NIK</b></th>
			<th width="150px"><b>NAMA </b></th>
			<th width="100px"><b>JENIS KELAMIN</b></th>
			<th width="110px"><b>JABATAN</b></th>
			<th width="100px"><b>JAM DATANG</b></th>
			<th width="100px"><b>JAM PULANG</b></th>
			<th width="50px"><b>ACTION</b></th>
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
	//$query="select tbkehadiran.rfid, mahasiswa.nama, mahasiswa.jabatan, tbkehadiran.id, tbkehadiran.jamdatang from mahasiswa, tbkehadiran WHERE mahasiswa.rfid=tbkehadiran.rfid";
	
	//Menampilkan hasil dengan Null apabila siswa belum ada / belum terdaftar
	/*
	$query="SELECT tbkehadiran.rfid, mahasiswa.nama, mahasiswa.nik, mahasiswa.jenis_kelamin, mahasiswa.jabatan, tbkehadiran.id, tbkehadiran.jamdatang, tbkehadiranpulang.jampulang 
	FROM  mahasiswa INNER JOIN (tbkehadiran INNER JOIN tbkehadiranpulang ON tbkehadiran.rfid=tbkehadiranpulang.rfid) ON mahasiswa.rfid=tbkehadiran.rfid ORDER BY id ASC";
	  
	$result=mysql_query($query);
	
			while($data=mysql_fetch_array($result)){ 
		echo ("<tr [align='center'>

				
				<td>".$data['rfid']."</td>
				<td>".$data['nik']."</td>
				<td>".$data['nama']."</td>
				<td>".$data['jenis_kelamin']."</td>
				<td>".$data['jabatan']."</td>
				<td>".$data['jamdatang']."</td>
				<td>".$data['jampulang']."</td>
				<td>".$data['jumlah']."</td>
				<td align='center'>
						
							
							<a href='hapus_data_absensi.php?id=".$data['id']."'><i class='fa fa-trash-o' style='color:#353a40'></i></a>&nbsp;
						</td>
			</tr>");
  }}*/

//koding nyari
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$sql = "SELECT
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
					TIMEDIFF(b.jampulang, b.jamdatang) 
				FROM mahasiswa a 
				INNER JOIN tbkehadiran b ON a.rfid = b.rfid 
				WHERE a.nama like '%".$cari."%'
				ORDER BY b.id ASC ";
	}else{
		$sql = "SELECT
					b.rfid,
					a.nama,
					a.nik,
					a.jenis_kelamin,
					a.jabatan,
					b.id,
					b.jamdatang,
					b.jampulang,
					b.status,
					DATE_FORMAT(
						b.jamdatang,'%H: % i: % s ') waktu_datang, 
					DATE_FORMAT(b.jampulang,' % H: % i: % s ') waktu_pulang,
					TIMEDIFF(b.jampulang, b.jamdatang) 
				FROM mahasiswa a 
				INNER JOIN tbkehadiran b ON a.rfid = b.rfid 
				ORDER BY b.id ASC";		
	}
		$data1 = mysql_query($sql);				
	$no = 1;
	while($data = mysql_fetch_array($data1)){
		

 
		echo ("<tr [align='center'>

				
				<td>".$data['rfid']."</td>
				<td>".$data['nik']."</td>
				<td>".$data['nama']."</td>
				<td>".$data['jenis_kelamin']."</td>
				<td>".$data['jabatan']."</td>
				<td>".$data['jamdatang']."</td>
				<td>".($data['status']==1?'':$data['jampulang'])."</td>
				<td align='center'>
						
							
							<a href='hapus_data_absensi.php?id=".$data['id']."'><i class='fa fa-trash-o' style='color:#353a40'></i></a>&nbsp;
						</td>
			</tr>");
  }} ?>
	</table>
	<?php $cari=$_GET['cari']; ?>
	<h3><center><a href="print_absensi.php?cari=<?php echo $cari;?>" target="_blank">PRINT TIPE .DOC</a></center></h3>
	<h3><center><a href="print_absensipdf.php?cari=<?php echo $cari;?>" target="_blank">PRINT TIPE .PDF</a></center></h3> 	
	
	
	</html>